# Template Tools

A Craft plugin to provide twig filters to help with template building.



## firstTag

Easily add a class, ID, or other attribute to the first element of a specific type. Use this to provide easy first paragraph classes.

```firstTag($value)
```

By default this adds a class name to the first P tag.
Add a `.` or `#` to set an ID or Class.


```firstTag($value,$tag)
```

Sets a class name or ID to the first tag of a type specified by you. E.g. `firstTag('lead','h2')`
Add a `.` or `#` to set an ID or Class.


```firstTag($value,$tag,$attr)
```

Sets a value for a specified attribute to the first tag of a type specified by you. E.g. ```firstTag('lead','h2','data-heading')
```
