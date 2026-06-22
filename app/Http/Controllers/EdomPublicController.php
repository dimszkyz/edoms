<?php

namespace App\Http\Controllers;

use App\Models\Edom;
use App\Models\EdomAnswer;
use App\Models\EdomOption;
use App\Models\EdomQuestion;
use App\Models\EdomResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EdomPublicController extends Controller
{
    public function show(Edom $edom): View
    {
        return view('edom.show', [
            'edom' => $this->prepareEdom($edom),
        ]);
    }

    public function submit(Request $request, Edom $edom): RedirectResponse
    {
        $edom = $this->prepareEdom($edom);
        $questions = $edom->categories->flatMap(fn ($category) => $category->questions);
        $optionIds = $edom->options->pluck('id')->map(fn ($id) => (string) $id)->values()->all();

        $rules = [
            'nama_responden' => ['nullable', 'string', 'max:150'],
            'nim' => ['nullable', 'string', 'max:50'],
        ];

        foreach ($questions as $question) {
            if ($this->isEssayQuestion($question)) {
                $rules["essays.{$question->id}"] = ['nullable', 'string', 'max:5000'];
            } else {
                $rules["answers.{$question->id}"] = ['required', Rule::in($optionIds)];
            }
        }

        $request->validate($rules, [
            'answers.*.required' => 'Semua pernyataan evaluasi wajib dipilih.',
            'answers.*.in' => 'Opsi jawaban yang dipilih tidak valid.',
        ]);

        DB::transaction(function () use ($request, $edom, $questions) {
            $response = EdomResponse::create([
                'edom_id' => $edom->id,
                'nama_responden' => $request->input('nama_responden'),
                'nim' => $request->input('nim'),
                'submitted_at' => now(),
            ]);

            foreach ($questions as $question) {
                if ($this->isEssayQuestion($question)) {
                    EdomAnswer::create([
                        'edom_response_id' => $response->id,
                        'edom_question_id' => $question->id,
                        'jawaban_teks' => $request->input("essays.{$question->id}"),
                    ]);

                    continue;
                }

                $optionId = (int) $request->input("answers.{$question->id}");
                $option = $edom->options->firstWhere('id', $optionId);

                EdomAnswer::create([
                    'edom_response_id' => $response->id,
                    'edom_question_id' => $question->id,
                    'edom_option_id' => $option?->id,
                    'nilai' => $option?->nilai,
                ]);
            }
        });

        return redirect()
            ->route('edom.fill', $edom)
            ->with('success', 'Terima kasih, jawaban EDOM Anda berhasil dikirim.');
    }

    private function prepareEdom(Edom $edom): Edom
    {
        $edom->load([
            'prodis',
            'mataKuliahs',
            'categories' => fn ($query) => $query->orderBy('id'),
            'categories.questions' => fn ($query) => $query->orderBy('id'),
            'options' => fn ($query) => $query->orderBy('urutan')->orderBy('nilai')->orderBy('id'),
        ]);

        if ($edom->options->isEmpty()) {
            $edom->setRelation(
                'options',
                EdomOption::query()
                    ->orderBy('urutan')
                    ->orderBy('nilai')
                    ->orderBy('id')
                    ->get()
            );
        }

        return $edom;
    }

    private function isEssayQuestion(EdomQuestion $question): bool
    {
        return in_array(strtolower((string) $question->tipe_soal), ['essay', 'esai', 'uraian', 'text', 'textarea'], true);
    }
}
