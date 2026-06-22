<x-filament-panels::page>
    @php
        $edom = $this->getEdom();
    @endphp

    <style>
        .edom-preview-page {
            font-family: Arial, Helvetica, sans-serif;
        }

        .edom-preview-form {
            margin-bottom: 16px;
        }

        .edom-table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .edom-preview-table {
            width: 100%;
            min-width: 920px;
            border-collapse: collapse;
            table-layout: fixed;
            background: #ffffff;
            border: 1px solid #5a5a5a;
        }

        .edom-preview-table th,
        .edom-preview-table td {
            border: 1px solid #5a5a5a;
            color: #222;
            padding: 10px 12px;
            vertical-align: middle;
        }

        .edom-preview-table thead th {
            font-size: 15px;
            font-weight: 700;
            text-align: center;
            line-height: 1.15;
            background: #f9f9f9;
        }

        .edom-col-no {
            width: 6.5%;
            text-align: center;
        }

        .edom-col-statement {
            width: 61%;
            font-size: 15px;
            line-height: 1.45;
            text-align: left;
        }

        .edom-col-opt {
            width: 8.125%;
            text-align: center;
        }

        .edom-section-row td {
            font-size: 15px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 12px 14px;
            background: #ffffff;
        }

        .edom-question-row td {
            height: 64px;
        }

        .edom-no {
            font-size: 15px;
            text-align: center;
        }

        .edom-radio {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 21px;
            height: 21px;
            border: 1.8px solid #a7a7a7;
            border-radius: 9999px;
            background: #ffffff;
            box-sizing: border-box;
        }

        .edom-radio::after {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 9999px;
            background: transparent;
        }

        .edom-empty {
            padding: 22px 0;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>

    <div class="edom-preview-page">
        <div class="edom-preview-form">
            {{ $this->form }}
        </div>

        @if ($edom)
            <div class="edom-table-wrap">
                <table class="edom-preview-table">
                    <colgroup>
                        <col class="edom-col-no">
                        <col class="edom-col-statement">
                        <col class="edom-col-opt">
                        <col class="edom-col-opt">
                        <col class="edom-col-opt">
                        <col class="edom-col-opt">
                    </colgroup>

                    <thead>
                        <tr>
                            <th style="width:50px">No.</th>
                            <th>Pernyataan Evaluasi</th>

                            @foreach ($edom->options as $option)
                                <th style="width:75px">
                                    {{ $option->label }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($edom->categories as $category)
                            <tr class="edom-section-row">
                                <td colspan="{{ $edom->options->count() + 2 }}">
                                    {{ strtoupper($category->nama_kategori) }}
                                </td>
                            </tr>

                            @foreach ($category->questions as $question)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $question->pernyataan }}
                                    </td>

                                    @foreach ($edom->options as $option)
                                        <td class="text-center">
                                            <span class="edom-radio"></span>
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-filament-panels::page>
