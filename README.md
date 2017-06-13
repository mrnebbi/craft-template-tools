# Template Tools


[![version 1.2.2](https://img.shields.io/badge/version-1.2.2-brightgreen.svg)](https://github.com/ianisted/template-tools)


A Craft plugin to provide twig filters to help with template building.



## firstTag

Easily add a class, ID, or other attribute to the first element of a specific type. Useful for adding a class to the first paragraph.

### Add a class

```
{{ content|firstTag('classname') }}
```

By default this adds a class name to the first P tag.
Add a `.` or `#` to set an ID or Class.

### Add an ID

```
{{ content|firstTag('#idname') }}
```

### Add to a non paragraph
Sets a class name or ID to the first tag of a type specified by you. e.g.

```
{{ content|firstTag('classname','h2') }}
```
Add a `.` or `#` to set an ID or Class.

### Add custom attribute and value to a non paragraph
Sets a value for a specified attribute to the first tag of a type specified by you.
```
{{ content|firstTag('slider1','img','data-slider') }}
```


```
{{ content|firstTag('lead','h2','data-heading') }}
```



## getFirstParagraph

Retrieve the first paragraph from content.

### Get paragraph only

```
{{ content|getFirstParagraph }}
```

### Get paragraph and remove P tags

Add a flag of true to remove the P tags from the content.

```
{{ content|getFirstParagraph(true) }}
```


## wrapLinesInTag

This wraps any lines in multiline text in a tag of your choosing.

```
{{ content|wrapLinesInTag('span') }}
```

## preserveQueryStrings

The Preserve Query String filter allows you to add `|preserveQueryStrings` to any URL output in twig, and it will keep the query strings as they should appear in the URL.

E.g.

```
{% if pageInfo.prevUrl %}<a href="{{ pageInfo.prevUrl|preserveQueryStrings }}">Previous Page</a>{% endif %}
{% if pageInfo.nextUrl %}<a href="{{ pageInfo.nextUrl|preserveQueryStrings }}">Next Page</a>{% endif %}
```


## getQueryStrings

Pull an array of query strings from Craft. This gets around the problem of duplicated query string keys being lost, turning them into an array you can loop through.

An array will be returned with objects. Use `.key` and `.value`.

### Return all URL queries

```
{% for query in getQueryStrings() %}
	{{ query.key }} - {{ query.value }}
{% endfor %}
```

### Return only URL queries that match a key

```
{% for query in getQueryStrings('lookForKey') %}
	{{ query.key }} - {{ query.value }}
{% endfor %}
```
