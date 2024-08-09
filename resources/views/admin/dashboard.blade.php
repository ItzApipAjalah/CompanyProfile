@extends('layouts.admin.index')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
            <div class="tab-content tab-content-basic">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                <div class="row">
                  <div class="col-lg-12 d-flex flex-column">
                    <div class="row flex-grow">
                      <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                  <div class="circle-progress-width">
                                    <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                  </div>
                                  <div>
                                    <p class="text-small mb-2">Total Visitors</p>
                                    <h4 class="mb-0 fw-bold">{{ $totalVisitors }} / {{ $maxVisitors }}</h4>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="circle-progress-width">
                                    <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                  </div>
                                  <div>
                                    <p class="text-small mb-2">Visits per day</p>
                                    <h4 class="mb-0 fw-bold">{{ $maxVisitsPerDay }} / {{ $maxVisitsPerDay }}</h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <p>Additional content here</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Total Visitors
        if ($('#totalVisitors').length) {
            var totalVisitorsValue = {{ $totalVisitors }};
            var maxVisitors = {{ $maxVisitors }};
            var totalVisitorsPercent = totalVisitorsValue / maxVisitors;

            var bar = new ProgressBar.Circle(totalVisitors, {
                color: '#fff',
                strokeWidth: 15,
                trailWidth: 15,
                easing: 'easeInOut',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: { color: '#52CDFF', width: 15 },
                to: { color: '#677ae4', width: 15 },
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    circle.setText('.');
                }
            });

            bar.text.style.fontSize = '1.5rem';
            bar.animate(totalVisitorsPercent); // Animate based on percentage
        }

        // Visits Per Day
        if ($('#visitperday').length) {
            var visitsPerDayValue = {{ $maxVisitsPerDay }};
            var maxVisitsPerDay = {{ $maxVisitsPerDay }};
            var visitsPerDayPercent = visitsPerDayValue / maxVisitsPerDay;

            var bar = new ProgressBar.Circle(visitperday, {
                color: '#fff',
                strokeWidth: 15,
                trailWidth: 15,
                easing: 'easeInOut',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: { color: '#34B1AA', width: 15 },
                to: { color: '#677ae4', width: 15 },
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    circle.setText('.');
                }
            });

            bar.text.style.fontSize = '1.5rem';
            bar.animate(visitsPerDayPercent); // Animate based on percentage
        }
    });
</script>
@endsection
