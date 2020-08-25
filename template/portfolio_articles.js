// Receive and output articles
var LoadArticles = () => {
	GetAjaxData('db_articles.php');
	$(document).ajaxComplete(() => {
		let html = `
			<div class=" col-xs-12 col-sm-12">
	            <div class="p-20"></div>
		        <div class="block-title">
					<h2>Articles</h2>
		        </div>
		`;

		if (object.length > 0) {
			object.forEach((e) => {
				html += `
					<p>${e.title}</p>
					<p>${e.authors}</p>
					<p>${e.date}</p>
					<hr>
				`;
			});
		}
		html += '</div>';

		$('#data').html(html);
	});
};