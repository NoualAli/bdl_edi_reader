<form action="{{ route('edi.index') }}" method="GET" class="is-pulled-right">
    @csrf
    @method('GET')
    <div class="field has-addons">
        @if (request()->has('search'))
            <div class="control">
                <a href="{{ route('edi.index') }}" class="button is-medium is-danger">
                    <i class="las la-times"></i>
                </a>
            </div>
        @endif
        <div class="control has-icons-left has-icons-right">
            <input class="input is-medium" type="search" placeholder="N° de référence"
                value="{{ request()->has('search') ? request()->search : '' }}"
                name="search">
            <span class="icon is-left">
                <i class="las la-search"></i>
            </span>
        </div>
        <div class="control">
            <button class="button is-medium is-info">
                <i class="las la-search"></i>
            </button>
        </div>
    </div>
</form>
<div class="is-clearfix"></div>
<br>
