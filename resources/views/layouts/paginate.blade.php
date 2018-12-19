@php($link_limit = 9)

@if ($paginator->lastPage() > 1)
    <ul class="pagination justify-content-center">
        @if( $paginator->currentPage() != 1 )
            @if( $paginator->currentPage() > 2 )
                <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}" title="First">
                    <a class="page-link" href="{{ $paginator->url(1) }}">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        <span class="sr-only">First</span>
                    </a>
                </li>
            @endif
            <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}" title="Previous">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1) }}">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span></a>
            </li>
        @endif
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ( $paginator->currentPage() < $half_total_links )
            {
                $to += $half_total_links - $paginator->currentPage();
            }
            if ( $paginator->lastPage() - $paginator->currentPage() < $half_total_links )
            {
                $from -= $half_total_links - ( $paginator->lastPage() - $paginator->currentPage() ) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor

        @if( $paginator->currentPage() != $paginator->lastPage() )

            <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" title="Next">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
            @if( $paginator->currentPage() != $paginator->lastPage()-1 )

                <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" title="Last">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">
                        <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                        <span class="sr-only">Last</span>
                    </a>
                </li>
            @endif
        @endif
    </ul>
@endif