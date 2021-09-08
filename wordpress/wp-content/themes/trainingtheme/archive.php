<?php get_header(); ?>

<main role="main" id="main-content">
	<h1>Categorie 1</h1>
	<article>
		<header>
			<h2><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, delectus.</a></h2>
			<figure>
				<img src="https://picsum.photos/400/300?random=1" alt="Random image 1">
				<figcaption class="visually-hidden">Random image 1</figcaption>
			</figure>
		</header>
		<main>
			<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate amet minima aliquid omnis, quis porro asperiores fugiat eligendi tenetur debitis tempore. Deserunt inventore quam sequi similique ratione, eveniet rerum est.</p>
		</main>
		<footer>
			<span>Par <a href="">John Doe</a> le 9 avril 2021</span>
			<a href="">Lire la suite</a>
		</footer>
	</article>
	<article>
		<header>
			<h2><a href="">Lorem ipsum dolor sit amet consectetur.</a></h2>
			<figure>
				<img src="https://picsum.photos/400/300?random=2" alt="Random image 2">
				<figcaption class="visually-hidden">Random image 2</figcaption>
			</figure>
		</header>
		<main>
			<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et non consequuntur impedit harum eius possimus similique dolore omnis tenetur aperiam, debitis blanditiis eveniet aliquam maiores itaque recusandae perspiciatis vero totam at? Fugit, obcaecati consectetur dolor impedit reiciendis voluptates perspiciatis accusamus consequuntur harum et eaque ex quo! Quae rerum et commodi?</p>
		</main>
		<footer>
			<span>Par <a href="">John Doe</a> le 9 avril 2021</span>
			<a href="">Lire la suite</a>
		</footer>
	</article>

	<nav class="pagination" role="navigation" aria-label="Navigation des articles">
		<h2 class="visually-hidden">Navigation des articles</h2>
		<ul class="page-numbers">
			<li><a class="" href=""><span class="visually-hidden">Articles </span>précédents</a></li>
			<li><span aria-current="page" class="page-numbers" href=""><span class="visually-hidden">Page </span>1</span></li>
			<li><a href=""><span class="visually-hidden">Page </span>2</a></li>
			<li><a href=""><span class="visually-hidden">Page </span>3</a></li>
			<li><a href=""><span class="visually-hidden">Articles </span>suivants</a></li>
		</ul>
	</nav>

	</nav>
</main>

<?php get_footer(); ?>