Markdown Extended Manifest
==========================

* version: 1.0-alpha
* source: http://github.com/markdown-extended/manifest

## Summary

This document explains the "official" specifications of the *Markdown Extended* ("**MDE**"
in the rest of this document) syntax. It intends to be a concise and complete set of
syntax's rules and tags to use to write in Markdown and to build parsers implementation.
It can be considered as the **MDE's reference** for any puprose.

## Introduction

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT",
"RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be interpreted as described
in [RFC 2119](http://tools.ietf.org/html/rfc2119).

The present specifications of the syntax DOES NOT suppose about the final rendering of the
Markdown content. This rendering is the purpose of the *parsers* and specific applications.
The "HTML" final output can be used as a rendering example but MAY NOT be a specification
reference.

Each item of the section below is identified by a structural ID composed like `A.B.C.` to allow
it to be referenced and used in citations, implementations, documentations etc.

These specifications are opened for discussion. If you want to correct a thing or propose
your vision of a part of them, please see the [contribute](#contribute) section of this
document.

## Markdown Extended specification

The syntax's rules below are separated in the following three types based on their utility:

**Typography**
:	Rules concerning the rendering of typographic writing usages, such as bold
	text or links ; this almost concerns a word, a group of words or an expression.

**Structure**
:	Rules concerning a special rendering of a sentence or a group of sentences,
	such as citations or pre-formated blocks.

**Miscellaneous**
:	Any rule that can not be classified in the two first categories.

### A. Typographic rules

#### A.1. Emphasis

Bold and italic text emphasis MAY keep simple to use and read. We kept the first idea about
these effects allowing two different typeface : the *underscore* (A.1.a.) and the 
*wildcard* (A.1.b.).

Two characters surrounding a bold text:

    __bold__ and **bold**

One character surrounding an italic text:

    _italic_ and *italic*

#### A.2. Abbreviations

Abbreviations MUST allow the [References](#c4_references) notation.

#### A.3. Code and variable names

    This variable `$var` can be accessed using `->get(...)` method

#### A.4. Images

Images MUST allow the [References](#c4_references) notation.

#### A.5. Links

Links MUST allow the [References](#c4_references) notation.

##### A.5.a. Hypertext links

    This is an automatic link: <http://link.com/query>.

    This page can be found at [this address](http://link.com/query).

Standalone URLs MAY NOT be automatically transformed in links if they are not written 
following one of the above rules.

##### A.5.b. In-page links (anchors)

    Reach section [my section](#section-id).

##### A.5.c. Emails links

    This is an automatic "mailto" link: <contact@web.site>.

    You can contact me at [this email address](contact@web.site).

#### A.6. Footnotes

Footnotes may be considered as a "special case" as we MAY allow writer to distinguish
simple footnotes of glossary and citations notes. The construction rules of these three
types MAY be follow the same idea, with a special construction for glossary and citation
notes, whish can be considered as a special footnote. Please refer to the [dedicated 
section](#notes-special-case) about notes.

### B. Structural rules

#### B.1. Titles

Global document's structure MAY be able to use both notations to build a single table
of contents.

#### B.2. Pre-formated texts

#### B.3. Citations

#### B.4. Lists

##### B.4.a. Unordered lists

##### B.4.b. Ordered lists

#### B.5. Terms definitions

#### B.6. Tables

### C. Miscellaneous rules

#### C.1. Metas

#### C.2. Escaping of meta-characters

#### C.3. Inline HTML

#### C.4. References

#### C.5. Implementors specifics

### D. The special case of notes {#notes-special-case}

#### Footnotes

A paragraph with a footnote[^footnote_one] note.

[^footnote_one]: Footnote content

#### Glossary notes

#### Citation notes


## Links

The original idea of the Markdown syntax came from [John Gruber](http://daringfireball.net/),
who defined its goal, the first Markdown syntax rules and coded a first parser
as a *Perl* script.

An extended implementation, **Markdown Extra**, has been written by [Michel Fortin](http://michelf.com/),
coded in *PHP* script.

Another extended implementation, **Multi Markdown**, has been written by 
[Fletcher T. Penney](http://fletcherpenney.net/), coded in *Perl* script.

## About

The Markdown Extended specification is authored and maintained by [Pierre 
Cassat](http://github.com/pierowbmstr).

If you'd like to leave feedback, please [open an issue on
GitHub](https://github.com/markdown-extended/manifest/issues).

## Contribute

This document and the MDE's specification are opened for any kind of discussion,
argumentation, translation and any other modification. The source of this document
is under a GIT version-control repository publicly hosted on [GitHub](http://github.com).
If you want to participate in any way, just [fork and edit](https://help.github.com/articles/fork-a-repo)
the original repository and ask for a [pull request](https://help.github.com/articles/using-pull-requests)
opening the appropriate issue ticket[^forking].

## License

This document is licensed under Creative Commons - CC BY 3.0
<http://creativecommons.org/licenses/by/3.0/>

[^forking]: GitHub embeds many tools and procedures to allow a quick and simple "*fork/pull request*" process.