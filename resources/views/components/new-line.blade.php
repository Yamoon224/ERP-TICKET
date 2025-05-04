<div class="modal" id="new-line">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">@lang('locale.new', ['param'=>__('locale.line', ['suffix'=>'', 'prefix'=>''])])</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="{{ route('lines.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-input-label for="city_from">@lang('locale.city_from') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="city_from" type="text" name="city_from" placeholder="{{ __('locale.city_from') }}" required />
                            </div>
                            <div class="form-group">
                                <x-input-label for="city_to">@lang('locale.city_to') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="city_to" type="text" name="city_to" placeholder="{{ __('locale.city_to') }}" required />
                            </div>
                            <div class="form-group">
                                <x-input-label for="price">@lang('locale.price') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="price" type="text" inputmode="numeric" name="price" placeholder="{{ __('locale.price') }}" required />
                            </div>

                            <x-app-button class="btn-block btn-primary">@lang('locale.submit')</x-app-button>
                        </div>
                    </div>
                </div>
            </form>            
        </div>
    </div>
</div>