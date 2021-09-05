@section('aside')

<aside class="aside">
  <div class="card">
    <ul class="list-group">
      <li class="list-group-item">
        <a class="d-block" href="{{ route('company-all') }}">
          Компании
        </a>
      </li>
      <li class="list-group-item">
        <a class="d-block" href="{{ route('company-subjects', $idCompany) }}">
          Темы
        </a>
      </li>
      <li class="list-group-item">
        <a class="d-block" href="{{ route('questions-sort', $idCompany) }}">
          Вопросы
        </a>
      </li>
    </ul>
  </div>
  @show
</aside>