@extends('layouts.app')
@section('title', 'Công ty Cổ phần Đầu tư & Kinh doanh Bất động sản Hải Phát')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{count($projects)}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <a href="{{route('projects.index')}}" target="_blank">
                                    <div class="icon icon-box-success ">
                                            <span class="mdi mdi-link icon-item"></span>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Dự án</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{count($news)}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <a href="{{route('news.index')}}" target="_blank">
                                    <div class="icon icon-box-success">
                                        <span class="mdi mdi-link icon-item"></span>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Tin tức</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{count($candidates)}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <a href="{{route('candidates.index')}}" target="_blank">
                                    <div class="icon icon-box-danger">
                                        <span class="mdi mdi-link icon-item"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Ứng tuyển viên</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{count($contacts)}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <a href="{{route('contacts.index')}}" target="_blank">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-link icon-item"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Liên hệ</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title">5 Ứng viên ứng tuyển mới nhất</h4>
                            <a href="{{route('candidates.index')}}" target="_blank">
                            <p class="text-muted mb-1 small">
                                Xem tất cả
                            </p></a>
                        </div>
                        <div class="preview-list">
                            @foreach($candidates as $key_c => $candi)
                            @if($key_c < 5)
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <img src="assets/images/businessman.png" style="background: #FFF;" alt="image" class="rounded-circle" />
                                </div>
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h6 class="preview-subject">{{$candi['fullname']}}</h6>
                                            <p class="text-muted text-small">{{date('H:i d-m-Y', strtotime($candi['created_at']))}}</p>
                                        </div>
                                        <p class="text-muted">{{($candi->recruit_id && $candi->recruit && isset($candi->recruit->name)) ? $candi->recruit->name : '' }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title">5 Liên hệ mới nhất</h4>
                            <a href="{{route('contacts.index')}}" target="_blank">
                                <p class="text-muted mb-1 small">
                                    Xem tất cả
                                </p></a>
                        </div>
                        <div class="preview-list">
                            @foreach($contacts as $key_ct => $contact)
                                @if($key_ct < 5)
                                    <div class="preview-item border-bottom">
                                        <div class="preview-thumbnail">
                                            <img src="assets/images/man.png" style="background: #FFF;" alt="image" class="rounded-circle" />
                                        </div>
                                        <div class="preview-item-content d-flex flex-grow">
                                            <div class="flex-grow">
                                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                    <h6 class="preview-subject">{{$candi['fullname']}}</h6>
                                                    <p class="text-muted text-small">{{date('H:i d-m-Y', strtotime($contact['created_at']))}}</p>
                                                </div>
                                                <p class="text-muted">{{$contact['email']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Biểu đồ dự án</h4>
                        <canvas id="transaction-historys" class="transaction-chart"></canvas>

                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">5 dự án mới nhất</h4>
                            <p class="text-muted mb-1">Thông tin</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    @foreach($projects as $key_p =>  $project)
                                    @if($key_p < 5)
                                    <div class="preview-item border-bottom">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-primary">
                                                <img src="{{$project['avatar'] ? $project['avatar'] : '/assets/images/project-management.png'}}" alt="{{$project['name']}}">
                                            </div>
                                        </div>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <h6 class="preview-subject">{{$project['name']}} <span style="font-weight: lighter;font-style: italic; font-size: 12px;">{{$project['status_project_id'] ? ' ('.$project->statusProject->name.')' : ''}}</span></h6>
                                                <p class="text-muted mb-0">Chủ đầu tư: {{$project['investor_id'] ? $project->investor->name_company : ''}}</p>
                                            </div>
                                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                                <p class="text-muted">{{$project['address']}}</p>
                                                <p class="text-muted mb-0 float-end">{{$project['created_at'] ? 'Ngày tạo: '.date('H:i d-m-Y', strtotime($project['created_at'])) : ''}} </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">10 Tin tức mới nhất</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> STT </th>
                                    <th> Tên bài viết</th>
                                    <th> Hình ảnh </th>
                                    <th> Danh mục </th>
                                    <th> Ngày đăng </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $key_n => $new)
                                        @if($key_n <10)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>
                                           {{$new['name']}}
                                        </td>
                                        <td>
                                            <img style="width: 100px; height: unset; border-radius: unset" src="https://admin.haiphatland.com.vn{{$new['avatar']}}" alt="{{$new['name']}}">
                                        </td>
                                        <td>
                                            <div class="badge badge-outline-success">{{$new->category->name}}</div>
                                        </td>
                                        <td> {{date('H:i d-m-Y', strtotime($new['created_at']))}}</td>

                                    </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script type='text/javascript'>
        $(function() {
            if ($("#transaction-historys").length) {
                var areaData = {
                    labels: [
                        <? foreach ($statusProjects as $val){ echo '"'.$val['name'].'",'; }?>
                    ],
                    datasets: [{
                        data: [
                            <? foreach ($statusProjects as $val){ echo '"'.$val['countProject'].'",';}?>
                        ],
                        backgroundColor: [
                            <? foreach ($statusProjects as $val){ echo '"'.$val['color'].'",';}?>
                        ]
                    }
                    ]
                };
                var areaOptions = {
                    responsive: true,
                    maintainAspectRatio: true,
                    segmentShowStroke: false,
                    cutoutPercentage: 70,
                    elements: {
                        arc: {
                            borderWidth: 0
                        }
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: true
                    }
                }
                var transactionhistoryChartPlugins = {
                    beforeDraw: function (chart) {
                        var width = chart.chart.width,
                            height = chart.chart.height,
                            ctx = chart.chart.ctx;

                        ctx.restore();
                        var fontSize = 1;
                        ctx.font = fontSize + "rem sans-serif";
                        ctx.textAlign = 'left';
                        ctx.textBaseline = "middle";
                        ctx.fillStyle = "#ffffff";

                        var text = "<?=count($projects)?>",
                            textX = Math.round((width - ctx.measureText(text).width) / 2),
                            textY = height / 2.4;

                        ctx.fillText(text, textX, textY);

                        ctx.restore();
                        var fontSize = 0.75;
                        ctx.font = fontSize + "rem sans-serif";
                        ctx.textAlign = 'left';
                        ctx.textBaseline = "middle";
                        ctx.fillStyle = "#6c7293";

                        var texts = "Total",
                            textsX = Math.round((width - ctx.measureText(text).width) / 1.93),
                            textsY = height / 1.7;

                        ctx.fillText(texts, textsX, textsY);
                        ctx.save();
                    }
                }
                var transactionhistoryChartCanvas = $("#transaction-historys").get(0).getContext("2d");
                var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
                    type: 'doughnut',
                    data: areaData,
                    options: areaOptions,
                    plugins: transactionhistoryChartPlugins
                });
            }
        })
    </script>
@endpush
