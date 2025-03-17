@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Botón "Anterior" con icono --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link"><i class="bi bi-arrow-left-circle"></i> Anterior</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="bi bi-arrow-left-circle"></i> Anterior
                    </a>
                </li>
            @endif

            {{-- Números de página --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link"><i class="bi bi-circle-fill"></i> {{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">
                                    <i class="bi bi-circle"></i> {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Botón "Siguiente" con icono --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        Siguiente <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Siguiente <i class="bi bi-arrow-right-circle"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
