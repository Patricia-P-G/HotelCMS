<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel CMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav class="navbar navbar-light bg-light navbar-expand-md">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?= get_template_directory_uri(); ?>/images/logo.png" alt="" width="45" height="36" class="d-inline-block align-text-top">
                    Hotel CMS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= get_permalink(get_page_by_path("events")) ?> ?>">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                    </ul>
                </div>
                <form class="d-flex navbar-form navbar-right">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <a href="search.html" class="btn btn-outline-success" type="submit">Search</a>
                </form>
            </div>
        </nav>
    </header>

    <main>