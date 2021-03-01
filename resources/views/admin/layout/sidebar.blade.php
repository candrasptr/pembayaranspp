<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">SMKN 1 PADAHERANG</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">PDH</a>
    </div>
      <ul class="sidebar-menu">
        {{-- dashboard --}}
        <li class="menu-header">Dashboard</li>
        <li class="@yield('dashboard')"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        
        {{-- Transaksi --}}
        <li class="menu-header">transaksi</li>
        <li class="@yield('transaksi')"><a class="nav-link" href="/transaksi"><i class="fas fa-donate"></i> <span>Pembayaran</span></a></li>
        
        @if (Auth::guard('admin')->user()->level == 'admin')
        <li class="menu-header">Entry data</li>
        <li class="@yield('siswa')"><a class="nav-link" href="/siswa"><i class="fas fa-user"></i> <span>Siswa</span></a></li>
        <li class="@yield('kelas')"><a class="nav-link" href="/kelas"><i class="fas fa-user"></i> <span>Kelas</span></a></li>
        <li class="@yield('petugas')"><a class="nav-link" href="/petugas"><i class="fas fa-user"></i> <span>Petugas</span></a></li>
        <li class="@yield('spp')"><a class="nav-link" href="/spp"><i class="fas fa-user"></i> <span>Spp</span></a></li>

        {{-- Laporan --}}
        <li class="menu-header">Laporan</li>
        <li class="@yield('data_guru')"><a class="nav-link" href="/data_guru"><i class="fas fa-address-book"></i> <span>Data guru</span></a></li>
        <li class="@yield('data_siswa')"><a class="nav-link" href="/data_siswa"><i class="fas fa-address-book"></i> <span>Data siswa</span></a></li>
        <li class="@yield('laporan')"><a class="nav-link" href="/rekap"><i class="fas fa-database"></i> <span>Pembayaran</span></a></li>
        @endif
        {{-- Entry data --}}        
      </ul>
  </aside>
</div>