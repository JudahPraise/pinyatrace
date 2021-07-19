<div class="row pl-3">
    <h3>Calauan Covid 19 Updates</h3>
  </div>
  <div class="row row-cols-2 row-cols-lg-4">
    <div class="col">
      <div class="card text-white bg-info">
        <div class="card-body">
          <div class="text-muted text-right mb-4">
            <i class="cil-medical-cross" style="font-size: 2rem"></i>
          </div>
          <div class="text-value-lg">{{ $active}}</div><small class="text-muted text-uppercase font-weight-bold">Active Cases</small>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col">
      <div class="card text-white bg-success">
        <div class="card-body">
          <div class="text-muted text-right mb-4">
            <i class="cil-happy" style="font-size: 2rem"></i>
          </div>
          <div class="text-value-lg">{{ $recovered }}</div><small class="text-muted text-uppercase font-weight-bold">Recovered</small>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <div class="text-muted text-right mb-4">
            <i class="cil-face-dead" style="font-size: 2rem"></i>
          </div>
          <div class="text-value-lg">{{ $mortality }}</div><small class="text-muted text-uppercase font-weight-bold">Mortality</small>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <div class="text-muted text-right mb-4">
            <i class="cil-people" style="font-size: 2rem"></i>
          </div>
          <div class="text-value-lg">{{ $total }}</div><small class="text-muted text-uppercase font-weight-bold">Total Cases</small>
        </div>
      </div>
    </div>
  </div>