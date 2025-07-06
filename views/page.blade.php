@include('partials.header')

@include('partials.render-blocks')

@include('helpers.load-js-module', ['path' => 'components/dialog'])

<div>
    <gs-dialog title="Filters">
        <span slot="trigger">Filters</span>
        <h2>Dialog Content here...</h2>
        <p>filters...</p>
    </gs-dialog>
</div>

@include('partials.footer')
