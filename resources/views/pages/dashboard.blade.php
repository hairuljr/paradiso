@extends('layouts.skote-admin')

@section('content')
<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>

        </div>
      </div>
    </div>
    <!-- end page title -->

    <div class="row">
      <div class="col-xl-4">
        <div class="card overflow-hidden">
          <div class="bg-primary bg-soft">
            <div class="row">
              <div class="col-7">
                <div class="text-primary p-3">
                  <h5 class="text-primary">Selamat Datang Kembali!</h5>
                  <p>{{ config('app.name') }} Dashboard</p>
                </div>
              </div>
              <div class="col-5 align-self-end">
                <img src="{{ asset('assets/skote/images/profile-img.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-sm-4">
                <div class="avatar-md profile-user-wid mb-4">
                  <img src="{{ asset('assets/skote/images/users/avatar-1.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                </div>
                <h5 class="font-size-15 text-truncate">{{ auth()->user()->name }}</h5>
                <p class="text-muted mb-0 text-truncate">Admin</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Pendapatan Bulanan</h4>
            <div class="row">
              <div class="col-sm-6">
                <p class="text-muted">Bulan Ini</p>
                <h3>Rp2.500.000</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <div class="row">
          <div class="col-md-4">
            <div class="card mini-stats-wid">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <p class="text-muted fw-medium">Orderan</p>
                    <h4 class="mb-0">1,235</h4>
                  </div>

                  <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                      <span class="avatar-title">
                        <i class="bx bx-copy-alt font-size-24"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mini-stats-wid">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <p class="text-muted fw-medium">Pendapatan</p>
                    <h4 class="mb-0">Rp3.000.000</h4>
                  </div>

                  <div class="flex-shrink-0 align-self-center ">
                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                      <span class="avatar-title rounded-circle bg-primary">
                        <i class="bx bx-archive-in font-size-24"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mini-stats-wid">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <p class="text-muted fw-medium">Pengeluaran</p>
                    <h4 class="mb-0">Rp2.400.000</h4>
                  </div>

                  <div class="flex-shrink-0 align-self-center">
                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                      <span class="avatar-title rounded-circle bg-primary">
                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-4">Latest Transaction</h4>
                <div class="table-responsive">
                  <table class="table align-middle table-nowrap mb-0">
                    <thead class="table-light">
                      <tr>
                        <th style="width: 20px;">
                          <div class="form-check font-size-16 align-middle">
                            <input class="form-check-input" type="checkbox" id="transactionCheck01">
                            <label class="form-check-label" for="transactionCheck01"></label>
                          </div>
                        </th>
                        <th class="align-middle">Order ID</th>
                        <th class="align-middle">Billing Name</th>
                        <th class="align-middle">Date</th>
                        <th class="align-middle">Total</th>
                        <th class="align-middle">Payment Status</th>
                        <th class="align-middle">Payment Method</th>
                        <th class="align-middle">View Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check font-size-16">
                            <input class="form-check-input" type="checkbox" id="transactionCheck02">
                            <label class="form-check-label" for="transactionCheck02"></label>
                          </div>
                        </td>
                        <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                        <td>Neal Matthews</td>
                        <td>
                          07 Oct, 2019
                        </td>
                        <td>
                          $400
                        </td>
                        <td>
                          <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                        </td>
                        <td>
                          <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                        </td>
                        <td>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                            View Details
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check font-size-16">
                            <input class="form-check-input" type="checkbox" id="transactionCheck03">
                            <label class="form-check-label" for="transactionCheck03"></label>
                          </div>
                        </td>
                        <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2541</a> </td>
                        <td>Jamal Burnett</td>
                        <td>
                          07 Oct, 2019
                        </td>
                        <td>
                          $380
                        </td>
                        <td>
                          <span class="badge badge-pill badge-soft-danger font-size-11">Chargeback</span>
                        </td>
                        <td>
                          <i class="fab fa-cc-visa me-1"></i> Visa
                        </td>
                        <td>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                            View Details
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check font-size-16">
                            <input class="form-check-input" type="checkbox" id="transactionCheck03">
                            <label class="form-check-label" for="transactionCheck03"></label>
                          </div>
                        </td>
                        <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2541</a> </td>
                        <td>Jamal Burnett</td>
                        <td>
                          07 Oct, 2019
                        </td>
                        <td>
                          $380
                        </td>
                        <td>
                          <span class="badge badge-pill badge-soft-danger font-size-11">Chargeback</span>
                        </td>
                        <td>
                          <i class="fab fa-cc-visa me-1"></i> Visa
                        </td>
                        <td>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                            View Details
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- end table-responsive -->
              </div>
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
    </div>
    <!-- end row -->
  </div>
</div>
@endsection
