<x-app-layout>
    @push('links')
    <x-app-datalink></x-app-datalink>
    @endpush

    <div class="content-wrapper w-100">
        <div class="container d-block mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <a class="btn btn-outline-primary" data-toggle="modal" data-target="#new-line">
                                            @lang('locale.new', ['param'=>__('locale.line', ['suffix'=>'', 'prefix'=>''])]) <i class="typcn icon typcn-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row grid-margin mb-2">
                                @if (!empty(session('message')))
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>@lang('locale.success')</strong>
                                        {{ session('message') }}
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row overflow-auto">
                                <div class="col-12">
                                    <table cellspacing="0" class="table table-striped" id="order-listing" width="100%">
                                        <thead class="bg-primary">
                                            <th class="text-white">#</th>
                                            <th class="text-white">@lang('locale.created_at')</th>
                                            <th class="text-white">@lang('locale.city_from')</th>
                                            <th class="text-white">@lang('locale.city_to')</th>
                                            <th class="text-white">@lang('locale.price')</th>
                                            <th class="text-white">@lang('locale.action', ['suffix'=>'s'])</th>
                                        </thead>
                                        <tbody>
                                            @foreach($lines as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->city_from }}</td>
                                                <td>{{ $item->city_to }}</td>
                                                <td>{{ moneyFormat($item->price) }}</td>
                                                <td>
                                                    <div style="display: inline-block">
                                                        <a class="btn btn-primary" href="{{ route('lines.edit', $item->id) }}">
                                                            <i class="typcn icon typcn-edit"></i>
                                                        </a>                                                          
                                                    </div>
                                                    <form action="{{ route('lines.destroy', $item->id) }}" style="display: inline-block" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" onclick="if(!confirm('@lang('locale.do_you_confirm')')){ return false }">
                                                            <i class="typcn typcn-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-new-line></x-new-line>
    @push('scripts')
    <x-app-datascript></x-app-datascript>
    @endpush
</x-app-layout>
