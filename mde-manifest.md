Markdown Extended Manifest
==========================

Summary
-------

This document explains the "official" specifications of the *Markdown Extended* (**MDE**)
syntax. It intends to be a concise and complete set of syntax's rules and tags to use
to write in Markdown and to build parsers implementation. It can be considered as the
**MDE's reference** for any puprose.

Introduction
------------

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD",
"SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be
interpreted as described in [RFC 2119](http://tools.ietf.org/html/rfc2119).

The present specifications of the syntax MAY NOT suppose about the final
rendering of the Markdown content. This rendering is the purpose of the
*parsers* and specific applications. The "HTML" final output can be used
as rendering example but MAY NOT be a specification reference.

These specifications are open for discussion. If you want to correct a thing or propose
your vision of a part of them, please see the [contribute](#contribute) section of this
document.

Markdown Extended specification
-------------------------------

The syntax's rules below are separated in the following three types based on their utility:

**Typography**
:	Rules concerning the rendering of typographic writing usages, such as bold
	text or links ; this almost concerns a word, a group of words or an expression.

**Block**
:	Rules concerning a special rendering of a sentence or a group of sentences,
	such as citations or pre-formated blocks.

**Miscellaneous**
:	Any rule that can not be classified in the two first categories.

### Typographic rules

#### Emphasis

Bold and italic text emphasis MAY keep simple to use and read. We kept the first idea about
these effects allowing two different typeface : the *underscore* and the *wildcard*.

Two characters surrounding a bold text:

    __bold__ and **bold**

One characters surrounding an italic text:

    _italic_ and *italic*

#### Hypertext links



### Block rules



### Miscellaneous rules


Links
-----

The original idea of the Markdown syntax came from [John Gruber](http://daringfireball.net/),
who defined its goal and coded a first parser as a *Perl* script.

An extended implementation, **Markdown Extra**, has been written by [Michel Fortin](http://michelf.com/),
coded in *PHP* script.

Another extended implementation, **Multi Markdown**, has been written by 
[Fletcher T. Penney](http://fletcherpenney.net/), coded in *Perl* script.

About
-----

The Markdown Extended specification is authored and maintained by [Pierre 
Cassat](http://github.com/pierowbmstr).

If you'd like to leave feedback, please [open an issue on
GitHub](https://github.com/markdown-extended/manifest/issues).

Contribute
----------

This document and the MDE's specification are opened for any kind of discussion and 
argumentation.

License
-------

This document is licensed under Creative Commons - CC BY 3.0
<http://creativecommons.org/licenses/by/3.0/>
