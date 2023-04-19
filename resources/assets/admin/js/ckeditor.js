import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor.js';
import AutoImage from '@ckeditor/ckeditor5-image/src/autoimage.js';
import ImageInsert from '@ckeditor/ckeditor5-image/src/imageinsert';
import Autoformat from '@ckeditor/ckeditor5-autoformat/src/autoformat.js';
import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment';
import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote.js';
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold.js';
import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder.js';
import CKFinderUploadAdapter from '@ckeditor/ckeditor5-adapter-ckfinder/src/uploadadapter.js';
import DataFilter from '@ckeditor/ckeditor5-html-support/src/datafilter.js';
import DataSchema from '@ckeditor/ckeditor5-html-support/src/dataschema.js';
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials.js';
import GeneralHtmlSupport from '@ckeditor/ckeditor5-html-support/src/generalhtmlsupport.js';
import Heading from '@ckeditor/ckeditor5-heading/src/heading.js';
import HorizontalLine from '@ckeditor/ckeditor5-horizontal-line/src/horizontalline.js';
import HtmlEmbed from '@ckeditor/ckeditor5-html-embed/src/htmlembed.js';
import Image from '@ckeditor/ckeditor5-image/src/image.js';
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption.js';
import ImageResize from '@ckeditor/ckeditor5-image/src/imageresize.js';
import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle.js';
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar.js';
import ImageUpload from '@ckeditor/ckeditor5-image/src/imageupload.js';
import Indent from '@ckeditor/ckeditor5-indent/src/indent.js';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic.js';
import Link from '@ckeditor/ckeditor5-link/src/link.js';
import List from '@ckeditor/ckeditor5-list/src/list.js';
import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed.js';
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph.js';
import PasteFromOffice from '@ckeditor/ckeditor5-paste-from-office/src/pastefromoffice.js';
import SourceEditing from '@ckeditor/ckeditor5-source-editing/src/sourceediting.js';
import Table from '@ckeditor/ckeditor5-table/src/table.js';
import TableColumnResize from '@ckeditor/ckeditor5-table/src/tablecolumnresize';
import TableCaption from '@ckeditor/ckeditor5-table/src/tablecaption';
import TableToolbar from '@ckeditor/ckeditor5-table/src/tabletoolbar.js';
import TextTransformation from '@ckeditor/ckeditor5-typing/src/texttransformation.js';

// Plugins to include in the build.
ClassicEditor.builtinPlugins = [
	AutoImage,
    Alignment,
    ImageInsert,
	Autoformat,
	BlockQuote,
	Bold,
	CKFinder,
	CKFinderUploadAdapter,
	DataFilter,
	DataSchema,
	Essentials,
	GeneralHtmlSupport,
	Heading,
	HorizontalLine,
	HtmlEmbed,
	Image,
	ImageCaption,
	ImageResize,
	ImageStyle,
	ImageToolbar,
	ImageUpload,
	Indent,
	Italic,
	Link,
	List,
	MediaEmbed,
	Paragraph,
	PasteFromOffice,
	SourceEditing,
	Table,
    TableColumnResize,
	TableToolbar,
    TableCaption,
	TextTransformation
];

// Editor configuration.
ClassicEditor.defaultConfig = {
	toolbar: {
		items: [
			'heading',
            'alignment',
			'bold',
			'italic',
			'link',
			'bulletedList',
			'numberedList',
			'horizontalLine',
			'|',
			'CKFinder',
            'insertImage',
			'htmlEmbed',
			'sourceEditing',
			'blockQuote',
			'insertTable',
            'toggleTableCaption',
			'mediaEmbed',
			'undo',
			'redo'
		]
	},
	language: 'ru',
	image: {
		toolbar: [
			'imageTextAlternative',
			'toggleImageCaption',
			'imageStyle:inline',
			'imageStyle:block',
			'imageStyle:side'
		]
	},
	table: {
		contentToolbar: [
			'tableColumn',
			'tableRow',
			'mergeTableCells'
		]
	}
};

ClassicEditor
    .create( document.querySelector( '#description' ), {
        toolbar: [ 'heading', 'blockQuote', '|', 'bold', 'italic'],
        ckfinder: {
            // To avoid issues, set it to an absolute path that does not start with dots, e.g. '/ckfinder/core/php/(...)'
            uploadUrl: '/ckfinder/connector?command=QuickUpload&type=Files&responseType=json'
        },
        placeholder: 'Предварительное описание',
        /* The editor configuration... */
    } )
    .then( function( editor ) {
        // console.log( editor );
    } )
    .catch( function( error ) {
        console.error( error );
    } );


ClassicEditor
    .create( document.querySelector( '#content' ), {
        ckfinder: {
            // To avoid issues, set it to an absolute path that does not start with dots, e.g. '/ckfinder/core/php/(...)'
            uploadUrl: '/ckfinder/connector?command=QuickUpload&type=Files&responseType=json'
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading2', view: { name: 'h2', classes: 'display-6 fw-bold mt-5 mb-4' }, title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
            ]
        },
        placeholder: 'Текст статьи',
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        htmlEmbed: {
            showPreviews: true
        },
    } )
    .then( function( editor ) {
        // console.log( editor );
    } )
    .catch( function( error ) {
        console.error( error );
    } );
