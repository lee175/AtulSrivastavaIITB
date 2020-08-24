$(() => {
	console.log('Portfolio.js loaded!');
	$.get('db_articles.php', (data) => {
		console.log(data);
	})
})