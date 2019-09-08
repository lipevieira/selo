@forelse ($notification as $item)
    <a href="#">
        <i class="fa fa-users text-aqua"></i>  {{ $item->name }}
    </a>
@empty
    <h3>Não há Notificações novas</h3>
@endforelse


