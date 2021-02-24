<footer class="pb-3 w-100 v-md-center px-4">
        <div class="col-auto me-auto">
            @if(isset($columns) && \Orchid\Screen\TD::isShowVisibleColumns($columns))
                <div class="btn-group dropup d-inline-block">
                    <button type="button"
                            class="btn btn-sm btn-link dropdown-toggle p-0 m-0"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            data-boundary="viewport"
                            aria-expanded="false">
                        {{ __('Configure columns') }}
                    </button>
                    <div class="dropdown-menu dropdown-column-menu dropdown-scrollable">
                        @foreach($columns as $column)
                            {!! $column->buildItemMenu() !!}
                        @endforeach
                    </div>
                </div>
            @endif

            @if($paginator instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                <small class="text-muted d-block">
                    {{ __('Displayed records: :from-:to of :total',[
                        'from' => ($paginator->currentPage() -1 ) * $paginator->perPage() + 1,
                        'to' => ($paginator->currentPage() -1 ) * $paginator->perPage() + count($paginator->items()),
                        'total' => $paginator->total(),
                    ]) }}
                </small>
            @endif

        </div>
        <div class="col-auto d-flex overflow-auto d-sm-block mt-3 mt-sm-0">
            {!!
                $paginator->appends(request()
                    ->except(['page','_token']))
                    ->onEachSide($onEachSide ?? 3)
                    ->links('platform::partials.pagination')
            !!}
        </div>
</footer>
