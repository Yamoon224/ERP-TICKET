<div class="modal" id="new-ticket">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">@lang('locale.new', ['param'=>__('locale.ticket', ['suffix'=>'', 'prefix'=>''])])</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="{{ route('tickets.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-input-label for="line">@lang('locale.line', ['prefix'=>'', 'suffix'=>'']) <span class="text-danger">*</span></x-input-label>
                                <select id="line" type="text" name="line" class="form-control select2" style="width: 100%" placeholder="{{ __('locale.ref') }}" required>
                                    @foreach ($lines as $item)
                                        <option value="{{ $item->id }}">{{ $item->city_from." - ".$item->city_to." - ".moneyformat($item->price) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <x-app-button class="btn-block btn-primary">@lang('locale.submit')</x-app-button>
                        </div>
                    </div>
                </div>
            </form>            
        </div>
    </div>
</div>