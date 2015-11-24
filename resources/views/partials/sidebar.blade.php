<ul class="nav nav-sidebar">
	<li{!! isset($page) && $page == 'dashboard' ? ' class="active"' : '' !!}>
        <a href="{!! route('dashboard') !!}">Dashboard</a>
    </li>
    <li{!! isset($page) && $page == 'question' ? ' class="active"' : '' !!}>
        <a href="{!! route('admin.question.index') !!}">Catégories</a>
    </li>
    <li{!! isset($page) && $page == 'category' ? ' class="active"' : '' !!}>
        <a href="{!! route('admin.category.index') !!}">Catégories</a>
    </li>
</ul>
