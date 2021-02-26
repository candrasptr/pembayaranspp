<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Ichibanresto</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">Ichi</a>
    </div>
      <ul class="sidebar-menu">
        {{-- dashboard --}}
        <li class="menu-header">Dashboard</li>
        <li class="@yield('dashboard')"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        {{-- Entry data --}}
        <li class="menu-header">Entry data</li>
        <li class="@yield('siswa')"><a class="nav-link" href="/siswa"><i class="fas fa-user"></i> <span>Siswa</span></a></li>
        <li class="@yield('kelas')"><a class="nav-link" href="/kelas"><i class="fas fa-user"></i> <span>Kelas</span></a></li>
        <li class="@yield('petugas')"><a class="nav-link" href="/petugas"><i class="fas fa-user"></i> <span>Petugas</span></a></li>
        <li class="@yield('spp')"><a class="nav-link" href="/spp"><i class="fas fa-user"></i> <span>Spp</span></a></li>
      </ul>
  </aside>
</div>