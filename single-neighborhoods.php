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
    #chartjs-tooltip {
        background: white;
        padding: 15px;
        border-radius: 5px;
        font-family: 'Outfit', sans-serif;
        font-size: 14px;
        position: absolute;
        text-align: left;
        transition: opacity 0.2s;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        min-width: 320px;
        margin-left: 15px;
    }

    .tooltip-title {
        font-size: 18px;
        margin-bottom: 5px;
        font-weight: 200;
    }

    .tooltip-item {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .tooltip-label {
        font-weight: 200;
        color: #555;
        font-size: 18px;
    }

    .tooltip-value {
        font-weight: 400;
        color: #000;
        font-size: 18px;
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
        document.querySelectorAll("td").forEach(function (td) {
            let parts = td.innerHTML.split("<br>");
            if (parts.length > 1) {
                td.innerHTML = parts[0] + "<br><span class='lighter-text'>" + parts[1] + "</span>";
            }
        });
    });

</script>