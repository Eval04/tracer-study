<!-- includes/sidebar.php -->
<div class="sidebar bg-white shadow-sm">
  <div class="text-center py-4">
    <img src="includes/img/Logo.jpg" alt="PPS UNM" style="max-width: 100px;">
    <p class="fw-bold mt-2 small text-uppercase">Tracer Study<br>Program Pasca Sarjana</p>
  </div>

  <ul class="nav flex-column px-3">
    <li class="nav-item mb-2">
      <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">
        <i class="fas fa-home me-2"></i> Dashboard
      </a>
    </li>
    <li class="nav-item mb-2">
      <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'data_alumni.php' ? 'active' : '' ?>" href="data_alumni.php">
        <i class="fas fa-users me-2"></i> Data Alumni
      </a>
    </li>
    <li class="nav-item mb-2">
      <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'view_answer.php' ? 'active' : '' ?>" href="view_answer.php">
        <i class="fas fa-file-alt me-2"></i> Data Penilaian
      </a>
    </li>
  </ul>

  <div class="px-3 mt-auto">
    <a href="logout.php" class="nav-link text-danger"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
  </div>
</div>
