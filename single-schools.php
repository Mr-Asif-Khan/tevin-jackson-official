<?php get_header(); ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap');
    body {
        font-family: 'Outfit', sans-serif !important;
    }
    p {
        margin-bottom: 0px;
    }
    :where(figure) {
        margin: 0 ;
    }
    .heading-with-icon div{
        width: fit-content !important;
        margin-right: 10px;
    }
    .fit-content{
        width: fit-content !important;
    }
</style>

<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".simple-table-without-head td").forEach(function (td) {
        let parts = td.innerHTML.split("<br>");
        if (parts.length > 1) {
          let rest = parts.slice(1).join("<br>");
          td.innerHTML = "<span class='lighter-text'>" + parts[0] + "</span>" + "<br>" + rest;
        }
      });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".simple-table-without-head-two td").forEach(function (td) {
        let parts = td.innerHTML.split("<br>");
        if (parts.length > 1) {
          let rest = parts.slice(1).join("<br>");
          td.innerHTML = parts[0] + "<br><span class='lighter-text'>" + rest + "</span>";
        }
      });
    });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".single-heading-table td").forEach(function (td) {
      let parts = td.innerHTML.split("<br>");
      if (parts.length > 1) {
        let rest = parts.slice(1).join("<br>");
        td.innerHTML = parts[0] + "<br><span class='lighter-text'>" + rest + "</span>";
      }
    });
  });

</script>

