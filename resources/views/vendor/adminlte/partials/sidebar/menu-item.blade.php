@inject('sidebarItemHelper', 'JeroenNoten\LaravelAdminLte\Helpers\SidebarItemHelper')

@if ($sidebarItemHelper->isHeader($item))
    {{-- Header --}}
    @include('adminlte::partials.sidebar.menu-item-header')
@elseif ($sidebarItemHelper->isLegacySearch($item) || $sidebarItemHelper->isCustomSearch($item))
    {{-- Search form --}}
    @include('adminlte::partials.sidebar.menu-item-search-form')
@elseif ($sidebarItemHelper->isMenuSearch($item))
    {{-- Search menu --}}
    @include('adminlte::partials.sidebar.menu-item-search-menu')
@elseif ($sidebarItemHelper->isSubmenu($item))
    {{-- Treeview menu --}}
    @include('adminlte::partials.sidebar.menu-item-treeview-menu')
@elseif ($sidebarItemHelper->isLink($item))
    {{-- Link --}}
    @if ((auth()->user()->role == 'Technicien') & ($item['text'] != 'Mes Demandes'))
        @include('adminlte::partials.sidebar.menu-item-link')
    @elseif (auth()->user()->role == 'Medecin')
        @include('adminlte::partials.sidebar.menu-item-link')
    @elseif (auth()->user()->role == 'Admin')
        @include('adminlte::partials.sidebar.menu-item-link')
    @endif
@endif
