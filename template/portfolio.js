// Variable to store the data received from database
var object = undefined;

// Get data from database into object
var GetAjaxData = (url) => {
	$.getJSON(url, (data) => {
		object = data;
	});
}

$('#button_articles').on('click', () => {
	LoadArticles();
	object = undefined;
});

$('#button_awards').on('click', () => {
	LoadAwards();
	object = undefined;
});

$('#button_conferences').on('click', () => {
	LoadConferences();
	object = undefined;
});

$('#button_projects').on('click', () => {
	LoadProjects();
	object = undefined;
});

$('#button_publications').on('click', () => {
	LoadPublications();
	object = undefined;
});
