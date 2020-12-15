<div class="col-lg-3 sidebar">
  <?php $cur_route = Route::current()->parameters();
    if(isset($cur_route['type'])) {
      $type = $cur_route['type'];
    }else{
    $type = '';

    }
   ?>
    <ul>
      <li class="sidebar-item">
        <a href="#">
          <img src="{{ asset('assets/img/common/menu.svg') }}" alt="">
          <span>
          все виды техники
        </span>
        </a>
      </li>
      <li class="sidebar-item @if($type == 'mobilo_telefonu_detalas') active @endif">
        <a href="{{ route('fixing-type', 'mobilo_telefonu_detalas') }}">
          <img src="{{ asset('assets/img/fixing/phone.svg') }}" alt="">
          <span>
          телефоны
        </span>
        </a>
      </li>
      <li class="sidebar-item  @if($type == 'planšetdatoru_detaļas') active @endif">
        <a href="{{ route('fixing-type', 'planšetdatoru_detaļas') }}">
          <img src="{{ asset('assets/img/fixing/tablet.svg') }}" alt="">
          <span>
          плашеты
        </span>
        </a>
      </li>
      <li class="sidebar-item @if($type == 'gudro_pulksteņu_detaļas') active @endif">
        <a href="{{ route('fixing-type', 'gudro_pulksteņu_detaļas') }}">
          <img src="{{ asset('assets/img/fixing/laptop.svg') }}" alt="">
          <span>
          ноутбуки
        </span>
        </a>
      </li>
    </ul>

  </div>
