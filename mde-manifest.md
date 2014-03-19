Markdown Extended Manifest
==========================

Summary
-------

This document explains the "official" specifications of the *Markdown Extended*
syntax. 

Introduction
------------

Created by [John Gruber](http://daringfireball.net/projects/markdown/) in 2004, 
**Markdown** is, as he says:

>    a text-to-HTML conversion tool for web writers. Markdown allows you 
>    to write using an easy-to-read, easy-to-write plain text format, then
>	 convert it to structurally valid XHTML (or HTML).

The **extended** version of Markdown, object of this document, intend to be
a concise and complete set of syntax's rules to use to write in Markdown
and to build parsers implementation.

Markdown Extended specification
-------------------------------

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD",
"SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be
interpreted as described in [RFC 2119](http://tools.ietf.org/html/rfc2119).

The syntax's rules below are separated in the following three types based on their utility:

**Typography**
:	Rules concerning the rendering of typographic writing usages, such as bold
	text or links ; this almost concerns a word, a group of words or expressions.

**Block**
:	Rules concerning a special rendering of a sentence or a group of sentences,
	such as citations or pre-formated blocks.

**Miscellaneous**
:	Any rule that can not be classified in the two first categories.

The present specifications of the syntax MAY NOT suppose about the final
rendering of the Markdown content. This rendering is the purpose of the
*parsers* and specific applications. The "HTML" final output can be used
as rendering example but MAY NOT be a specification reference.


Links
-----

The first idea was from [John Gruber](http://daringfireball.net/), coded in *Perl* script.

An extended implementation, known as **Markdown Extra**, has been written by [Michel Fortin](http://michelf.com/),
coded in *PHP* script.

Another extended implementation, known as **Multi Markdown**, has been written by 
[Fletcher T. Penney](http://fletcherpenney.net/), coded in *Perl* script.

About
-----

The Markdown Extended specification is authored by [Pierre 
Cassat](http://github.com/pierowbmstr).

If you'd like to leave feedback, please [open an issue on
GitHub](https://github.com/markdown-extended/manifest/issues).


License
-------

This document is licensed under Creative Commons - CC BY 3.0
<http://creativecommons.org/licenses/by/3.0/>
