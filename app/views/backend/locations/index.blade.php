@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Locations ::
@parent
@stop

{{-- Page content --}}
@section('content')

<div class="row header">
    <div class="col-md-12">
        <a href="{{ route('create/location') }}" class="btn btn-success pull-right"><i class="fa fa-plus icon-white"></i>  @lang('general.create')</a>
        <h3>@lang('admin/locations/table.locations')</h3>
    </div>
</div>

<div class="row form-wrapper">

    <table
    name="categories"
    id="table"
    data-url="{{ route('api.locations.list') }}"
    data-cookie="true"
    data-click-to-select="true"
    data-cookie-id-table="locationsTable">
        <thead>
            <tr>
                <th data-sortable="true" data-field="name">@lang('admin/locations/table.name')</th>
                <th data-sortable="false" data-field="parent">@lang('admin/locations/table.parent')</th>
                <th data-searchable="false" data-sortable="false" data-field="assets">@lang('general.assets')</th>
                <th data-searchable="true" data-sortable="true" data-field="currency">@lang('general.currency')</th>
                <th data-searchable="true" data-sortable="true" data-field="address">@lang('admin/locations/table.address')</th>
                <th data-searchable="true" data-sortable="true" data-field="city">@lang('admin/locations/table.city')
                </th>
                <th data-searchable="true" data-sortable="true" data-field="state">
                 @lang('admin/locations/table.state')
                </th>
                <th data-searchable="true" data-sortable="true" data-field="country">
                @lang('admin/locations/table.country')</th>
                <th data-switchable="false" data-searchable="false" data-sortable="false" data-field="actions">{{ Lang::get('table.actions') }}</th>
            </tr>
        </thead>
    </table>
</div>

@section('moar_scripts')
<script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
<script src="{{ asset('assets/js/extensions/cookie/bootstrap-table-cookie.js') }}"></script>
<script src="{{ asset('assets/js/extensions/mobile/bootstrap-table-mobile.js') }}"></script>
<script src="{{ asset('assets/js/extensions/export/bootstrap-table-export.js') }}"></script>
<script src="//rawgit.com/kayalshri/tableExport.jquery.plugin/master/tableExport.js"></script>
<script src="//rawgit.com/kayalshri/tableExport.jquery.plugin/master/jquery.base64.js"></script>
<script type="text/javascript">
    $('#table').bootstrapTable({
        classes: 'table table-responsive table-no-bordered',
        undefinedText: '',
        iconsPrefix: 'fa',
        showRefresh: true,
        search: true,
        pageSize: {{{ Setting::getSettings()->per_page }}},
        pagination: true,
        sidePagination: 'server',
        sortable: true,
        cookie: true,
        mobileResponsive: true,
        showExport: true,
        showColumns: true,
        exportDataType: 'all',
        exportTypes: ['csv', 'txt','json', 'xml'],
        maintainSelected: true,
        paginationFirstText: "@lang('general.first')",
        paginationLastText: "@lang('general.last')",
        paginationPreText: "@lang('general.previous')",
        paginationNextText: "@lang('general.next')",
        pageList: ['10','25','50','100','150','200'],
        icons: {
            paginationSwitchDown: 'fa-caret-square-o-down',
            paginationSwitchUp: 'fa-caret-square-o-up',
            columns: 'fa-columns',
            refresh: 'fa-refresh'
        },

    });
</script>
@stop

@stop
