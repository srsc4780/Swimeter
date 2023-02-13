<tr class="{{ $rowClass ?? null }}" id="_{{ $key }}">
    @if ($thumb ?? false)

    @endif
    <td class="title">
        {{ $title }}
        @if ($description ?? false)
            <small>{!! $description !!}</small>
        @endif
    </td>

    <td class="right aligned actions">
        @if (@$actions || @$viewLink || @$editLink || @$deleteLink)
            <div class="ui floating right labeled icon dropdown mini button" data-action="nothing">
                <span class="text">Actions</span>
                <i class="dropdown icon"></i>

                <div class="menu">
                    @if ($actions ?? false)
                        {!! $actions !!}
                    @endif

                    @if ($viewLink ?? false)
                        <a href="{{ $viewLink }}" class="item"><i class="eye icon"></i> View</a>
                    @endif

                    @if ($editLink ?? false)
                        <a href="{{ $editLink }}" class="item"><i class="pencil icon"></i> Edit</a>
                    @endif

                    @if ($deleteLink ?? false)
                        <a href="{{ $deleteLink }}" class="item" data-delete="customer"><i class="delete icon"></i> Delete</a>
                    @endif
                </div>
            </div>
        @endif
    </td>
</tr>
