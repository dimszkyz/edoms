<style>
    .header {
        background-color: #ffffff;
        border-bottom: 1px solid #e5e7eb;
        width: 100%;
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .header-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 16px 24px;
        display: flex;
        align-items: center;
    }

    .header-brand {
        display: flex;
        align-items: center;
        gap: 20px;
        text-decoration: none;
        width: 100%;
    }

    .header-logo {
        height: 78px;
        width: auto;
        object-fit: contain;
        flex-shrink: 0;
        display: block;
    }

    .brand-unw {
        display: flex;
        align-items: center;
        gap: 18px;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        min-width: 0;
    }

    .brand-text-left {
        display: flex;
        flex-direction: column;
        justify-content: center;
        line-height: 1.1;
        min-width: 0;
    }

    .brand-main {
        font-size: 34px;
        font-weight: 900;
        color: #022B63;
        line-height: 1;
        letter-spacing: -0.8px;
        white-space: nowrap;
    }

    .brand-sub {
        font-size: 11px;
        font-weight: 700;
        color: #374151;
        line-height: 1.35;
        margin-top: 4px;
    }

    .brand-divider {
        width: 2px;
        height: 60px;
        background-color: #d1d5db;
        flex-shrink: 0;
    }

    .brand-school {
        font-size: 18px;
        font-weight: 900;
        color: #022B63;
        line-height: 1.2;
        letter-spacing: 0.3px;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .brand-school span {
        display: block;
        font-size: 18px;
        font-weight: 900;
        color: #022B63;
        text-transform: uppercase;
    }

    @media (max-width: 768px) {
        .header-container {
            padding: 10px 14px;
        }

        .header-brand {
            gap: 12px;
        }

        .header-logo {
            height: 52px;
        }

        .brand-unw {
            gap: 0;
        }

        .brand-main {
            font-size: 22px;
            letter-spacing: -0.5px;
        }

        .brand-text-left {
            line-height: 1;
        }

        .brand-sub,
        .brand-divider,
        .brand-school {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .header-container {
            padding: 8px 12px;
        }

        .header-brand {
            gap: 10px;
        }

        .header-logo {
            height: 46px;
        }

        .brand-main {
            font-size: 19px;
        }
    }

    @media (max-width: 360px) {
        .header-logo {
            height: 42px;
        }

        .brand-main {
            font-size: 17px;
        }
    }
</style>

<header class="header">
    <div class="header-container">
        <a class="header-brand" href="{{ route('edom.home') }}">
            <img src="{{ asset('assets/images/logo_unwnobg.svg') }}" alt="Logo UNW" class="header-logo">

            <div class="brand-unw">
                <div class="brand-text-left">
                    <div class="brand-main">EDOM</div>
                    <div class="brand-sub">
                        Universitas Ngudi Waluyo<br>
                        Pasca Sarjana
                    </div>
                </div>

                <div class="brand-divider"></div>

                <div class="brand-school">
                    POSTGRADUATE SCHOOL<br>
                    UNIVCASARJANA
                </div>
            </div>
        </a>
    </div>
</header>
