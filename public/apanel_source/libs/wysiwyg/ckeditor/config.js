/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {

// Toolbar groups configuration.
config.toolbar = [
	{ name: 'mode',items: ['Source']},
	{ name: 'undo', items: ['Undo','Redo']},
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
	{ name: 'paragraph', groups: [ 'list', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'insert', items: [ 'Image' ] },
	{ name: 'styles', items: [ 'Format' ] },
	{ name: 'table', items: ['Table']}
	
];
config.height = "400px";
config.extraPlugins = 'table';
config.allowedContent = true;
};

