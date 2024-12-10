<x-app-layout>
    <x-slot name="header">
        <div class="flex-wrap d-flex justify-content-between align-items-center -mt-3">
            <div>
                <h1 class="h1 line-clamp-1">{{ __('Detail') . ' ' . $catalogue->catalogue_name }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('catalogues.index') }}">{{ __('Catalogues') }}</a>
                        </li>
                        <li class="breadcrumb-item active max-text-20ch" aria-current="page">{{ __('Detail ') }}
                            {{ $catalogue->catalogue_name }} </li>
                    </ol>
                </nav>
                <div class="d-flex gap-3">
                    <p><b>{{ __('Created at: ') }}</b>{{ $catalogue->created_at->format('d M Y H:i:s') }}</p>
                    <p><b>{{ __('Last Modified: ') }}</b>{{ $catalogue->updated_at->format('d M Y H:i:s') }}</p>
                </div>
            </div>
            <div class="container-btn-detail-catalogue">
                {{-- statistics --}}
                <a href="{{ route('catalogues.catalogueStatistics', $catalogue) }}"
                    class="btn btn-link btn-soft-light px-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 16.5C6 16.1022 6.15804 15.7206 6.43934 15.4393C6.72064 15.158 7.10218 15 7.5 15C7.89782 15 8.27936 15.158 8.56066 15.4393C8.84196 15.7206 9 16.1022 9 16.5V18C9 18.3978 8.84196 18.7794 8.56066 19.0607C8.27936 19.342 7.89782 19.5 7.5 19.5C7.10218 19.5 6.72064 19.342 6.43934 19.0607C6.15804 18.7794 6 18.3978 6 18V16.5ZM15 10.5C15 10.1022 15.158 9.72064 15.4393 9.43934C15.7206 9.15804 16.1022 9 16.5 9C16.8978 9 17.2794 9.15804 17.5607 9.43934C17.842 9.72064 18 10.1022 18 10.5V18C18 18.3978 17.842 18.7794 17.5607 19.0607C17.2794 19.342 16.8978 19.5 16.5 19.5C16.1022 19.5 15.7206 19.342 15.4393 19.0607C15.158 18.7794 15 18.3978 15 18V10.5ZM10.5 13.5C10.5 13.1022 10.658 12.7206 10.9393 12.4393C11.2206 12.158 11.6022 12 12 12C12.3978 12 12.7794 12.158 13.0607 12.4393C13.342 12.7206 13.5 13.1022 13.5 13.5V18C13.5 18.3978 13.342 18.7794 13.0607 19.0607C12.7794 19.342 12.3978 19.5 12 19.5C11.6022 19.5 11.2206 19.342 10.9393 19.0607C10.658 18.7794 10.5 18.3978 10.5 18V13.5Z"
                            fill="white" />
                        <path
                            d="M6 2.25H4.5C3.70435 2.25 2.94129 2.56607 2.37868 3.12868C1.81607 3.69129 1.5 4.45435 1.5 5.25V21C1.5 21.7956 1.81607 22.5587 2.37868 23.1213C2.94129 23.6839 3.70435 24 4.5 24H19.5C20.2956 24 21.0587 23.6839 21.6213 23.1213C22.1839 22.5587 22.5 21.7956 22.5 21V5.25C22.5 4.45435 22.1839 3.69129 21.6213 3.12868C21.0587 2.56607 20.2956 2.25 19.5 2.25H18V3.75H19.5C19.8978 3.75 20.2794 3.90804 20.5607 4.18934C20.842 4.47064 21 4.85218 21 5.25V21C21 21.3978 20.842 21.7794 20.5607 22.0607C20.2794 22.342 19.8978 22.5 19.5 22.5H4.5C4.10218 22.5 3.72064 22.342 3.43934 22.0607C3.15804 21.7794 3 21.3978 3 21V5.25C3 4.85218 3.15804 4.47064 3.43934 4.18934C3.72064 3.90804 4.10218 3.75 4.5 3.75H6V2.25Z"
                            fill="white" />
                        <path
                            d="M14.25 1.5C14.4489 1.5 14.6397 1.57902 14.7803 1.71967C14.921 1.86032 15 2.05109 15 2.25V3.75C15 3.94891 14.921 4.13968 14.7803 4.28033C14.6397 4.42098 14.4489 4.5 14.25 4.5H9.75C9.55109 4.5 9.36032 4.42098 9.21967 4.28033C9.07902 4.13968 9 3.94891 9 3.75V2.25C9 2.05109 9.07902 1.86032 9.21967 1.71967C9.36032 1.57902 9.55109 1.5 9.75 1.5H14.25ZM9.75 0C9.15326 0 8.58097 0.237053 8.15901 0.65901C7.73705 1.08097 7.5 1.65326 7.5 2.25V3.75C7.5 4.34674 7.73705 4.91903 8.15901 5.34099C8.58097 5.76295 9.15326 6 9.75 6H14.25C14.8467 6 15.419 5.76295 15.841 5.34099C16.2629 4.91903 16.5 4.34674 16.5 3.75V2.25C16.5 1.65326 16.2629 1.08097 15.841 0.65901C15.419 0.237053 14.8467 0 14.25 0L9.75 0Z"
                            fill="white" />
                    </svg>
                </a>
                {{-- Edit --}}
                <a href="{{ route('catalogues.edit', $catalogue) }}" class="btn btn-link btn-soft-light px-3">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.253 3.4101C23.3931 3.55069 23.4718 3.7411 23.4718 3.9396C23.4718 4.13811 23.3931 4.32852 23.253 4.4691L21.6885 6.0351L18.6885 3.0351L20.253 1.4691C20.3936 1.3285 20.5844 1.24951 20.7833 1.24951C20.9821 1.24951 21.1729 1.3285 21.3135 1.4691L23.253 3.4086V3.4101ZM20.628 7.0941L17.628 4.0941L7.4085 14.3151C7.32594 14.3976 7.2638 14.4983 7.227 14.6091L6.0195 18.2301C5.9976 18.2961 5.99449 18.3669 6.01052 18.4346C6.02655 18.5023 6.06108 18.5642 6.11026 18.6133C6.15944 18.6625 6.22133 18.6971 6.28901 18.7131C6.35669 18.7291 6.42749 18.726 6.4935 18.7041L10.1145 17.4966C10.2251 17.4602 10.3258 17.3986 10.4085 17.3166L20.628 7.0941Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.5 20.75C1.5 21.3467 1.73705 21.919 2.15901 22.341C2.58097 22.7629 3.15326 23 3.75 23H20.25C20.8467 23 21.419 22.7629 21.841 22.341C22.2629 21.919 22.5 21.3467 22.5 20.75V11.75C22.5 11.5511 22.421 11.3603 22.2803 11.2197C22.1397 11.079 21.9489 11 21.75 11C21.5511 11 21.3603 11.079 21.2197 11.2197C21.079 11.3603 21 11.5511 21 11.75V20.75C21 20.9489 20.921 21.1397 20.7803 21.2803C20.6397 21.421 20.4489 21.5 20.25 21.5H3.75C3.55109 21.5 3.36032 21.421 3.21967 21.2803C3.07902 21.1397 3 20.9489 3 20.75V4.25C3 4.05109 3.07902 3.86032 3.21967 3.71967C3.36032 3.57902 3.55109 3.5 3.75 3.5H13.5C13.6989 3.5 13.8897 3.42098 14.0303 3.28033C14.171 3.13968 14.25 2.94891 14.25 2.75C14.25 2.55109 14.171 2.36032 14.0303 2.21967C13.8897 2.07902 13.6989 2 13.5 2H3.75C3.15326 2 2.58097 2.23705 2.15901 2.65901C1.73705 3.08097 1.5 3.65326 1.5 4.25V20.75Z"
                            fill="white" />
                    </svg>
                </a>
                {{-- Delete --}}
                <form action="{{ route('catalogues.destroy', $catalogue->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link btn-soft-light px-3"
                        onclick="return confirm('Are you sure delete {{ $catalogue->catalogue_name }}?')">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_4551_941)">
                                <path
                                    d="M8.25 8.75C8.44891 8.75 8.63968 8.82902 8.78033 8.96967C8.92098 9.11032 9 9.30109 9 9.5V18.5C9 18.6989 8.92098 18.8897 8.78033 19.0303C8.63968 19.171 8.44891 19.25 8.25 19.25C8.05109 19.25 7.86032 19.171 7.71967 19.0303C7.57902 18.8897 7.5 18.6989 7.5 18.5V9.5C7.5 9.30109 7.57902 9.11032 7.71967 8.96967C7.86032 8.82902 8.05109 8.75 8.25 8.75ZM12 8.75C12.1989 8.75 12.3897 8.82902 12.5303 8.96967C12.671 9.11032 12.75 9.30109 12.75 9.5V18.5C12.75 18.6989 12.671 18.8897 12.5303 19.0303C12.3897 19.171 12.1989 19.25 12 19.25C11.8011 19.25 11.6103 19.171 11.4697 19.0303C11.329 18.8897 11.25 18.6989 11.25 18.5V9.5C11.25 9.30109 11.329 9.11032 11.4697 8.96967C11.6103 8.82902 11.8011 8.75 12 8.75ZM16.5 9.5C16.5 9.30109 16.421 9.11032 16.2803 8.96967C16.1397 8.82902 15.9489 8.75 15.75 8.75C15.5511 8.75 15.3603 8.82902 15.2197 8.96967C15.079 9.11032 15 9.30109 15 9.5V18.5C15 18.6989 15.079 18.8897 15.2197 19.0303C15.3603 19.171 15.5511 19.25 15.75 19.25C15.9489 19.25 16.1397 19.171 16.2803 19.0303C16.421 18.8897 16.5 18.6989 16.5 18.5V9.5Z"
                                    fill="white" />
                                <path
                                    d="M21.75 5C21.75 5.39782 21.592 5.77936 21.3107 6.06066C21.0294 6.34196 20.6478 6.5 20.25 6.5H19.5V20C19.5 20.7956 19.1839 21.5587 18.6213 22.1213C18.0587 22.6839 17.2956 23 16.5 23H7.5C6.70435 23 5.94129 22.6839 5.37868 22.1213C4.81607 21.5587 4.5 20.7956 4.5 20V6.5H3.75C3.35218 6.5 2.97064 6.34196 2.68934 6.06066C2.40804 5.77936 2.25 5.39782 2.25 5V3.5C2.25 3.10218 2.40804 2.72064 2.68934 2.43934C2.97064 2.15804 3.35218 2 3.75 2H9C9 1.60218 9.15804 1.22064 9.43934 0.93934C9.72064 0.658035 10.1022 0.5 10.5 0.5L13.5 0.5C13.8978 0.5 14.2794 0.658035 14.5607 0.93934C14.842 1.22064 15 1.60218 15 2H20.25C20.6478 2 21.0294 2.15804 21.3107 2.43934C21.592 2.72064 21.75 3.10218 21.75 3.5V5ZM6.177 6.5L6 6.5885V20C6 20.3978 6.15804 20.7794 6.43934 21.0607C6.72064 21.342 7.10218 21.5 7.5 21.5H16.5C16.8978 21.5 17.2794 21.342 17.5607 21.0607C17.842 20.7794 18 20.3978 18 20V6.5885L17.823 6.5H6.177ZM3.75 5H20.25V3.5H3.75V5Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4551_941">
                                    <rect width="24" height="24" fill="white" transform="translate(0 0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </form>
                <a href="{{ route('catalogues.preview', $catalogue) }}" class="btn btn-warning">
                    {{ __('See Preview') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="col-lg-12 container-link-banner-preview">
        <div class="row row-gap-4 h-100">
            <div class="col-12 col-lg-4">
                <div class="card p-4 h-100 mb-0 d-flex justify-content-between">
                    <h3 class="h3 fw-bold mb-4">{{ __('Link') }}</h3>
                    <div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"
                                value="{{ env('APP_URL') . '/api/catalogues/' . $catalogue->id }}"
                                id="linkCatalogueJSON" readonly>
                            <button class="btn btn-gray-subtle" type="button" id="buttonCopyLinkJSON"
                                onclick="copyTextToClipboard('linkCatalogueJSON', 'buttonCopyLinkJSON')">
                                {{ __('Copy JSON') }}
                            </button>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control"
                                value="{{ env('APP_URL') . '/catalogues/' . $catalogue->id . '/live' }}"
                                id="linkCatalogueIframe" readonly>
                            <button class="btn btn-gray-subtle" type="button" id="buttonCopyLinkIframe"
                                onclick="copyTextToClipboard('linkCatalogueIframe', 'buttonCopyLinkIframe')">
                                {{ __('Copy Iframe') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 h-100">
                <div class="card p-4 mb-0 d-flex justify-content-between card-banner-preview">
                    <h3 class="h3 fw-bold mb-3">{{ __('Banner') }}</h3>
                    @if ($catalogue->size == '1388x250')
                        <img src="{{ $catalogue->catalogue_banner }}" alt=""
                            style="width: 100%; max-width: 694px; height: 120px; object-fit: cover;">
                    @else
                        <img src="{{ $catalogue->catalogue_banner }}" alt=""
                            style="width: 100%; max-width: 300px; height: 100px; object-fit: cover;">
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="70" height="70" rx="4" fill="#C4CCF8" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M30.0746 40.0942C23.803 40.0942 18 43.0755 18 46.8308C18 50.586 23.7682 49.961 30.0738 49.961C36.3455 49.961 41.7005 50.5844 41.7005 46.8308C41.7005 43.0771 36.3802 40.0942 30.0746 40.0942Z"
                            stroke="#3A57E8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M51.9857 46.9389C51.9857 49.9892 47.4545 49.4826 42.1477 49.4826C42.1477 49.4826 43.1452 47.4083 43.2408 45.9925C43.3629 44.1848 42.1484 41.4648 42.1484 41.4648C47.4839 41.4648 51.9857 43.8887 51.9857 46.9389Z"
                            stroke="#3A57E8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M30.0747 34.7383C34.1904 34.7383 37.5262 31.4382 37.5262 27.3684C37.5262 23.2986 34.1904 20 30.0747 20C25.959 20 22.6216 23.2986 22.6216 27.3684C22.6077 31.4245 25.9219 34.7246 30.0222 34.7383H30.0747Z"
                            stroke="#3A57E8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M44.3842 36.0983C47.5947 36.0983 50.1969 33.495 50.1969 30.2844C50.1969 27.0739 47.5947 24.4717 44.3842 24.4717C41.1737 24.4717 38.5703 27.0739 38.5703 30.2844C38.5594 33.4841 41.1447 36.0875 44.3432 36.0983H44.3842Z"
                            stroke="#3A57E8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="text-end">
                        <span>{{ __('Impressions') }}</span>
                        <h3>{{ number_format($catalogue->catalogueStatistics->sum('impression'), 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="70" height="70" rx="8" fill="#D5EBDF" />
                        <path
                            d="M35.2646 18.0527C32.106 18.0527 29.006 18.9123 26.2919 20.5408C23.5777 22.1692 21.3501 24.5061 19.8442 27.3047C18.3383 30.1033 17.61 33.2598 17.7361 36.441C17.8622 39.6222 18.838 42.7101 20.5607 45.3787C22.2833 48.0472 24.6888 50.1975 27.5231 51.6025C30.3575 53.0075 33.5157 53.615 36.6642 53.361C39.8127 53.107 42.8347 52.0008 45.4113 50.1593C47.9879 48.3178 50.0235 45.8093 51.3031 42.8985L46.7659 40.872C45.8483 42.9594 44.3886 44.7583 42.5409 46.0789C40.6932 47.3994 38.5261 48.1927 36.2682 48.3748C34.0104 48.557 31.7457 48.1213 29.7131 47.1138C27.6805 46.1062 25.9555 44.5643 24.7202 42.6506C23.4849 40.7369 22.7851 38.5226 22.6947 36.2413C22.6043 33.96 23.1266 31.6964 24.2065 29.6895C25.2864 27.6826 26.8838 26.0068 28.8302 24.839C30.7765 23.6713 32.9995 23.0549 35.2646 23.0549V18.0527Z"
                            fill="#1AA053" />
                        <path
                            d="M52.0428 40.8866C52.8135 38.4599 53.0303 35.8862 52.6775 33.3516C52.3246 30.8169 51.411 28.3846 50.0026 26.2304C48.5943 24.0762 46.7263 22.2539 44.5337 20.8951C42.3411 19.5364 39.8787 18.6751 37.3243 18.3737L36.8213 23.0952C38.6715 23.3136 40.4551 23.9374 42.0432 24.9215C43.6313 25.9057 44.9843 27.2256 46.0044 28.7859C47.0245 30.3462 47.6862 32.108 47.9418 33.9438C48.1973 35.7797 48.0403 37.6438 47.4821 39.4015L52.0428 40.8866Z"
                            fill="#1AA053" />
                        <path
                            d="M35.4466 46.1196C37.3178 46.1196 39.1554 45.618 40.7709 44.6662C42.3864 43.7144 43.7218 42.3466 44.64 40.7032C45.5582 39.0597 46.0263 37.1996 45.9963 35.3137C45.9662 33.4278 45.4391 31.5839 44.469 29.971C43.4989 28.3581 42.1207 27.0342 40.4757 26.1352C38.8307 25.2361 36.9781 24.7943 35.1078 24.8548C33.2375 24.9154 31.4169 25.4762 29.8325 26.4798C28.2481 27.4834 26.957 28.8937 26.0916 30.566L29.4488 32.3311C30.0036 31.2589 30.8314 30.3547 31.8472 29.7113C32.863 29.0678 34.0303 28.7082 35.2294 28.6694C36.4285 28.6306 37.6163 28.9139 38.6709 29.4903C39.7256 30.0667 40.6092 30.9155 41.2312 31.9496C41.8532 32.9837 42.1911 34.1659 42.2104 35.375C42.2296 36.5841 41.9295 37.7767 41.3408 38.8304C40.7521 39.8841 39.896 40.761 38.8602 41.3712C37.8244 41.9815 36.6463 42.3031 35.4466 42.3031V46.1196Z"
                            fill="#1AA053" />
                        <path
                            d="M25.5637 31.6907C24.9908 33.1258 24.7504 34.6746 24.8604 36.2231C24.9703 37.7716 25.4277 39.2803 26.1989 40.6383C26.9701 41.9962 28.0355 43.1688 29.3166 44.0697C30.5977 44.9705 32.062 45.5768 33.6017 45.8439L34.2087 42.1142C33.231 41.9446 32.3012 41.5596 31.4877 40.9876C30.6742 40.4155 29.9977 39.6709 29.508 38.8086C29.0182 37.9463 28.7278 36.9883 28.658 36.005C28.5882 35.0217 28.7408 34.0383 29.1046 33.127L25.5637 31.6907Z"
                            fill="#1AA053" />
                    </svg>
                    <div class="text-end">
                        <span>{{ __('Banner Click') }}</span>
                        <h3>{{ number_format($catalogue->catalogueStatistics->sum('click'), 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="70" height="70" rx="8" fill="#F2D6D3" />
                        <path
                            d="M35 18C31.1002 18 27.3122 19.3026 24.2372 21.701C21.1622 24.0995 18.9764 27.4563 18.0268 31.2387C17.0771 35.021 17.4181 39.0122 18.9956 42.5787C20.573 46.1452 23.2966 49.0826 26.7339 50.9247C30.1712 52.7667 34.1252 53.4079 37.9685 52.7464C41.8118 52.0849 45.3239 50.1586 47.9475 47.2733C50.5712 44.388 52.1559 40.7091 52.4501 36.8204C52.7444 32.9318 51.7313 29.0563 49.5717 25.809L47.4627 27.2117C49.3097 29.9889 50.1762 33.3035 49.9245 36.6293C49.6728 39.9552 48.3175 43.1016 46.0736 45.5693C43.8297 48.037 40.8259 49.6845 37.5389 50.2503C34.2519 50.816 30.87 50.2677 27.9302 48.6922C24.9904 47.1168 22.6611 44.6045 21.312 41.5542C19.9628 38.5039 19.6712 35.0904 20.4834 31.8554C21.2955 28.6205 23.165 25.7495 25.7949 23.6982C28.4249 21.6469 31.6647 20.5328 35 20.5328V18Z"
                            fill="#C03221" />
                        <path
                            d="M35 22C31.9916 22 29.0694 23.0048 26.6973 24.855C24.3252 26.7052 22.639 29.2948 21.9064 32.2126C21.1738 35.1304 21.4368 38.2093 22.6537 40.9606C23.8705 43.7119 25.9715 45.9779 28.6231 47.3989C31.2746 48.82 34.3249 49.3146 37.2897 48.8044C40.2545 48.2942 42.9639 46.8083 44.9879 44.5825C47.0118 42.3568 48.2344 39.5188 48.4615 36.519C48.6886 33.5192 47.9072 30.5295 46.2413 28.0245L44.4608 29.2086C45.8627 31.3168 46.5204 33.833 46.3293 36.3576C46.1382 38.8823 45.1092 41.2707 43.4059 43.1439C41.7025 45.0171 39.4222 46.2676 36.927 46.6971C34.4318 47.1265 31.8647 46.7102 29.6331 45.5142C27.4015 44.3182 25.6334 42.4112 24.6092 40.0957C23.5851 37.7802 23.3638 35.1889 23.9803 32.7333C24.5969 30.2776 26.016 28.0983 28.0124 26.5411C30.0088 24.984 32.4681 24.1383 35 24.1383V22Z"
                            fill="#C03221" />
                        <rect x="34.5" y="18" width="2" height="18" fill="#C03221" />
                        <circle cx="35.5" cy="36" r="2" fill="#C03221" />
                    </svg>
                    <div class="text-end">
                        <span>{{ __('CTR') }}</span>
                        <h3>
                            @php
                                $impressions = $catalogue->catalogueStatistics->sum('impression');
                                $clicks = $catalogue->catalogueStatistics->sum('click');
                            @endphp

                            @if ($impressions > 0)
                                {{ number_format(($clicks / $impressions) * 100, 2, '.', '') }} %
                            @else
                                {{ __('0%') }}
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="70" height="70" rx="8" fill="#FFEFB3" />
                        <path
                            d="M38.1842 22.8279L41.321 22.8279C41.8733 22.8279 42.321 23.2756 42.321 23.8279L42.321 32.7563M43.9758 26.1374L44.5642 26.1374C45.1417 26.1374 45.5992 26.6251 45.5622 27.2014L44.993 36.0658M28.7307 52.4351L44.0719 45.9493C44.5806 45.7343 44.8186 45.1475 44.6036 44.6388L35.0727 22.095C34.8576 21.5863 34.2709 21.3482 33.7622 21.5633L18.4211 28.0491C17.9124 28.2641 17.6743 28.8509 17.8894 29.3595L27.4203 51.9034C27.6353 52.4121 28.222 52.6501 28.7307 52.4351Z"
                            stroke="#B38E00" stroke-width="2" stroke-linecap="round" />
                        <path d="M29.7326 33.5604L33.6338 36.3986L32.965 41.1766L29.0642 38.3383L29.7326 33.5604Z"
                            fill="#B38E00" />
                    </svg>
                    <div class="text-end">
                        <span>{{ __('Total Products') }}</span>
                        <h3>{{ $catalogue->products->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card p-5">
            <div class="flex-wrap d-flex justify-content-between align-items-center mb-48">
                <h3 class="h3 fw-bold">{{ __('List of Products') }}</h3> <a
                    href="{{ route('catalogues.products.create', $catalogue->id) }}"
                    class="btn btn-primary">{{ __('Create Product') }}</a>
            </div>
            @if (session('success'))
                <div class="alert alert-left alert-success alert-dismissible fade show mb-3" role="alert">
                    <span> {{ session('success') }}</span>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function() {
                        $('.alert').alert('close');
                    }, 5000);
                </script>
            @endif
            <div class="table-responsive">
                <table class="table my-5 w-100" id="product-table">
                    <thead>
                        <tr>
                            <th>{{ __('No') }}</th>
                            <th>{{ __('Thumbnail') }}</th>
                            <th>{{ __('Product Name') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Disc Price') }}</th>
                            <th>{{ __('URL') }}</th>
                            <th>{{ __('Click') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody> </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        let table = $('#product-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: "{{ route('catalogues.show', $catalogue->id) }}",
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                error: function(xhr, error, thrown) {
                    console.log("Ajax error: ", error, thrown);
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'thumbnail',
                    name: 'thumbnail',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'original_price',
                    name: 'original_price'
                },
                {
                    data: 'discounted_price',
                    name: 'discounted_price'
                },
                {
                    data: 'product_url',
                    name: 'product_url'
                },
                {
                    data: 'click',
                    name: 'click'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            columnDefs: [{
                targets: 2,
                className: "max-text-20ch"
            }]
        });
    });


    function copyTextToClipboard(textId, buttonCopyId) {
        let copyText = document.getElementById(textId);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);

        let textBtn = document.getElementById(buttonCopyId);
        textBtn.innerHTML = "Copied";
        setTimeout(function() {
            textBtn.innerHTML = textId == 'linkCatalogueJSON' ? "Copy JSON" : "Copy Iframe";
        }, 5000);
    }
</script>
