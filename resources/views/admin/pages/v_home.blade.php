<!--awal konten dinamis-->
@extends('admin.v_admin')
@section('judulhalaman', 'Home')
@section('title', 'Home')

<!--awal isi konten dinamis-->
@section('konten')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">

                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$perusahaan}}</h3>

                        <p>Jumlah Perusahaan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="admin/perusahaan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$pengumuman}}</h3>

                        <p>Jumlah Pengumuman</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="admin/pengumuman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 class="text-white">{{$jurusan}}</h3>

                        <p class="text-white">Jumlah Jurusan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/jurusan" class="small-box-footer"><text class="text-white">More info </text><i class="fas fa-arrow-circle-right text-white"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$kelas}}</h3>

                        <p>Jumlah Kelas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="/kelas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <!-- /.row -->
        <!-- Main row -->

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$umkm}}</h3>

                        <p>Jumlah UMKM</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="admin/umkm" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
        </div>

    </div><!-- /.container-fluid -->
@endsection
<!--akhir isi konten dinamis-->

<!--akhir konten dinamis-->
