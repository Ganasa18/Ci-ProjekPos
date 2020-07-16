<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= $title; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Home</a></li>
          <li class="breadcrumb-item active">403 Forbidden Page</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="error-page">
    <h2 class="headline text-warning"> 403</h2>

    <div class="error-content">
      <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page forbidden.</h3>

      <p>
        We could not find the page you were looking for.
        Meanwhile, you may <a href="<?= base_url('user') ?>">return to user</a> or try using the search form.
      </p>
    </div>
  </div>
</section>