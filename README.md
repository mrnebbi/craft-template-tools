# Template Tools

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
