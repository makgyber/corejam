<div class="row">
    <table class="table table-responsive-sm table-hover table-outline mb-0">
      <thead class="thead-light">
        <tr>
          <th class="text-center">
            <svg class="c-icon">
              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-people"></use>
            </svg>
          </th>
          <th>Coordinators</th>
          <th class="text-center">Region</th>
          <th>Budget</th>
          <th class="text-center">Disbursed</th>
          <th>Last Activity</th>
        </tr>
      </thead>
      <tbody>

        @forelse($coordinators as $coordinator)
        <tr>
          <td class="text-center text-white">
            <div class="c-avatar bg-gradient-{{Arr::random(['warning','info','dark','light','primary','danger'])}}">
              @if($coordinator->image!='')
              <img class="c-avatar-img rounded-pill" style="width: 2.5em;height:2.5em"
                src="{{ url('/storage/'.auth()->user()->image) }}" alt="{{ Auth::user()->email }}">
              @else
              {{substr($coordinator->first_name,0, 1)}}{{substr($coordinator->last_name,0, 1)}}
              @endif
              <span class="c-avatar-status bg-success"></span>
            </div>
          </td>
          <td>
            <div>{{ $coordinator->name }}</div>
            <div class="small text-muted"><span>New</span> | Registered: {{date('M d, Y', strtotime($coordinator->created_at))}}</div>
          </td>
          <td class="text-center"><i class="flag-icon flag-icon-us c-icon-xl" id="us" title="us">{{$coordinator->region_name ?? ''}}</i></td>
          <td>
            <div class="clearfix">
              <div class="float-left"><strong>{{$coordinator->support_how_much ?? ''}}</strong></div>
            </div>
            {{-- <div class="progress progress-xs">
              <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
          </td>
          <td class="text-center">
            <div class="float-right"><strong>{{$coordinator->disbursed ?? ''}}</strong></div>
          </td>
          <td>
          <strong>{{$coordinator->title ?? ''}}</strong>
          </td>
        </tr>
        @empty
        @endforelse


        
      </tbody>
    </table>
    <br>
    {{$coordinators->links()??''}}
</div>