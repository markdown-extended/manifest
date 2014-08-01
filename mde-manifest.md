Markdown Extended specifications
================================ 

* version: 1.0-alpha
* source: http://github.com/markdown-extended/manifest

----

**Please note that this document is still a DRAFT of the final specifications: some work
remains before the first published version and all its content may change before this publication.**

----

This document explains the "official" specifications of the *Markdown Extended* 
("**MDE**" in the rest of this document) syntax. It intends to be a concise and complete set 
of syntax's rules and tags to use to write under Markdown Extended and a reference to build 
parsers  implementations. It can be considered as the **MDE's reference** for any puprose. 
The goal of these specifications is NOT to explain *how to write a content* but *how to build it* 
using the MDE's syntax.

This document is authored and maintained by Pierre Cassat ([@pierowbmstr][piwi])
and licensed under [Creative Commons - CC BY 3.0][cc-by-3].

**Table of contents:**

[TOC]


Introduction
------------

**[Markdown][wiki-markdown]** is originally a plain text formatting syntax created by 
[John Gruber][wiki-john-gruber] and [Aaron Swartz][wiki-aaron-swartz]. It allows to write contents 
with an easy-to-read, easy-to-write set of rules for plain text format then convert it in a rich format 
(basically HTML).

Many developers have proposed their own implementation of the original syntax with specific
evolutions and extensions. The goal of **MDE** is to define an official and homogeneous new
version, the most complete and rich as possible, while keeping only the relevant evolutions
or more used rules. **MDE can be considered by developers as the new standard for Markdown,
so that each user does not need to adapt to the current implementation but can use these rules 
everywhere.**


Inspiration
-----------

The original idea of the Markdown syntax came from [John Gruber][daring-fireball],
who defined its goal, the first Markdown syntax rules and coded a first parser
as a *Perl* script. He also wrote [the first manual][markdown-manual].

Working on these specifications, the following implementations inspired us:

-   [**Markdown Extra**][markdown-extra], written by [Michel Fortin][michel-fortin], coded in *PHP* script
-   [**Multi Markdown**][multi-markdown], written by [Fletcher T. Penney][fletcher-penney], coded in *Perl* script
-   [**PHP Markdown Extra Extended**][php-markdown-extra-extended], written by [Egil Hansen][egil-hansen], coded in *PHP* script


Contribute
----------

This document and the MDE's specification are opened for any kind of discussion, argumentation, 
translation and any other modification.

If you'd like to leave feedback, please [open an appropriate issue on GitHub][package-issues].
You could first search in existing tickets if your comment does not already exists. If your
ticket concerns a specific rule, please include its reference in its title like `X.Y.Z. Ticket title ...`.

The source of this document is maintained under a GIT version-control repository publicly hosted on [GitHub][github].
If you want to participate in any way, just [fork and edit][github-fork-doc] the original repository 
and ask for a [pull request][github-pull-doc] opening the appropriate issue ticket[^forking].

If you want to contribute by translating this document, follow the steps above and create a 
copy of the original `mde-manifest.md` file named like `mde-manifest.LN.md` where `LN` is
your language code following the [ISO 639-1 list][iso-639-1].

And finally, THANK YOU for being involved ;)


Scope and definitions
---------------------

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", 
"RECOMMENDED", "MAY" and "OPTIONAL" in this document are to be interpreted as described in 
[RFC 2119][rfc-2119].

The present specifications of the syntax DOES NOT suppose about the final rendering of the 
Markdown content. This rendering is the purpose of the *parsers* and specific applications.
The "HTML" final output can be used as a rendering example but MUST NOT be a specification reference.

Each item of the sections below is identified by a structural ID composed like `A.B.C.` 
to allow it to be referenced and used in citations, implementations, documentations etc.

For the purposes of this document, the following terms and definitions apply:

**notes** - The notes of this document (marked with the `NOTE - ` tag) MUST be considered as part
of the specifications.

**advices** - The advices (marked with the `ADVICE - ` tag) are written to facilitate writers 
choices but MUST NOT be considered as specifications rules.

**blank line** - a "blank line" in MDE is any line that does not output anything ; this concept
is developed in the sections below.

**meta characters** - any character used in at least one rule of the syntax.

**reference** - a mark of any kind that refers to a definition written elsewhere in the document
(at its bottom for instance) ; this concept is developed in the sections below.

**indentation** - in MDE like in many other languages, the "indentation" is made by writing
a *tabulation* OR *four spaces* from last indentation limit (originally the left side of the 
document, which is the "indentation zero" limit) ; this concept is developed in the sections below.

**writers** - in these specifications, "writers" designates the "user", the persons who
write contents using the MDE syntax

**parsers** - in these specifications, "parser" designates the application in charge to treat
the original MDE content and transform it in a rich language ; the final rendering MUST NOT
be important while reading the specifications

**implementations** - this designates the various "parsers"

**configuration** - this designates an optional set of options a parser can accept to define
some of its behaviors


A. Basic concepts {#A}
----------------------

The sections below will explain each tag to use for each writing rule. As a very first introduction
to the MDE syntax, we MUST ALWAYS keep the following basis in mind:

-   **a Markdown content is written as plain text**: it MUST be working by any software reading 
    file (such as `vi`) and be readable by a human "as-is" (this is the very first goal of Markdown)
-   as Markdown rules are written using some specific characters, **these characters MAY be escaped**
    to be used "as-is" (this is developed below)
-   **a paragraph is created in Markdown passing a blank line** (this rule is developed below)
-   **all the rules MUST be used in one single Markdown content** and be parsed correctly
    (any conflict between rules MUST be avoided)
-   for convenience, **the "references" notation MUST be allowed for a maximum of rules**
    (this notation is explained below) as it permits to keep a content readable.

### A.1. Intention {#A1}

The MDE rules MUST keep ALL original Markdown's rules valid.

### A.2. Global construction {#A2}

### A.3. MDE file format {#A3}

### A.4. Rules ranking {#A4}

The syntax's rules of these specifications are separated in the following three types based on their utility:

**Typography**
:	Rules concerning the rendering of typographic writing usages, such as bold
	text or links ; this almost concerns a word, a group of words or an expression.

**Structure**
:	Rules concerning a special rendering of a sentence or a group of sentences,
	such as citations or pre-formated blocks.

**Miscellaneous**
:	Any rule that can not be classified in the two first categories.


### A.5. Blank lines {#A5}

A "blank line" in MDE is any line that does not output anything ; a line with only spaces 
or tabulations MUST be considered as a blank line.

### A.6. Indentation {#A6}

The indentation level in MDE is *1 tabulation* or *four spaces*:

    1 tab = 4 spaces = 1 indentation level

Any block of content that requires an indentation MAY allow any other syntax's rule to be
used in that content, considering the first character of the first indented line as the new 
left side of its own indentation.

To specify the end of the block (and of its indentation level), writers MUST pass two blank lines.

### A.7. Automatic escaping {#C7}



B. Typographic rules {#B}
-------------------------

A rule is considered as *typographic* when it only concerns one or more words written inline
in a text. As long it does not concern a full block of text, a rule MUST be considered as *typographic*.


### B.1. Emphasis {#B1}

Bold and italic text emphasis MUST keep simple to use and read. The first idea was kept about
these effects allowing two different typeface: the *underscore* (B.1.a.) and the *wildcard* (B.1.b.).

#### B.1.a. Emphasis with underscores {#B1a}

Italic text is written surrounded by one character:

    _italic_

Bold text is written surrounded by two characters:

    __bold__

#### B.1.b. Emphasis with wildcards {#B1b}

Italic text is written surrounded by one character:

    *italic*

Bold text is written surrounded by two characters:

    **bold**

ADVICE - For a document often read "as is" as plain text, the wildcard notation MAY be used
as it seems to let the reader understand word's importance.

#### B.1.c. Emphasis auto-escaping {#B1c}

In-words underscores MAY NOT be considered as emphasis delimiters ; for instance, 
writing `my_underscored_words`, the `underscored` word MAY NOT be in italic but the whole
expression MAY be kept "as-is". In other words, writing `__my_underscored_words__` MAY be
rendered as the expression `my_underscored_words` written in bold text (*leading and trailing
characters are considered as emphasis delimiters but internal characters are auto-escaped*).
This rule is important in a case like `underscored_words followed by other_underscores`
as it seems easier to let a parser match the two distant underscores as delimiters while this
MAY NOT be the case (*underscores may be kept "as-is" in both expressions*).


### B.2. Abbreviations {#B2}

An abbreviation is written like a [reference](#c4_references) with a leading asterisk:

    *[HTML]: Hyper Text Markup Language


### B.3. Code and variable names {#B3}

Inline code and variables MUST keep simple to use and read. The first idea was kept about
this span: surround the code or variable name between *backticks*. A code span MUST allow 
spaces inside.

    This variable `$var` can be accessed using the `-> get(...)` method


### B.4. Links {#B4}

A *link* concerns any kind of *hypertext link* (a full URL), in-page link (a hash tag referencing
a section of current document) and any other kind of "clickable" thing in an HTML content,
such as an email address, a phone number etc.

Standalone URLs MUST NOT be automatically transformed in links if they are not written following one 
of the below rules. An URL written inline in a content with no specific "link" tag is not a link, it
is just a raw URL (in an HTML content, it MAY NOT be clickable).

#### B.4.a. Raw inline links {#B4a}

Making an URL (or any kind of text) clickable can be done by surrounding it between angle brackets:

    <http://link.com/query>

Any text written like that MUST be rendered clickable (with a special treatment if required,
such as email adresses links).

#### B.4.b. Inline links {#B4b}

Links can be written *inline* in the text, separated in two parts:

-   the link text between brackets
-   then, between parenthesis, the URL of the link (relative or absolute) and an optional 
    title wrapped in double-quotes followed by a list of attributes if necessary.


    [a simple link](http://test.com/)

    [a link with a title](http://test.com/ "My optional title")

    [a link with a title and some attributes](http://test.com/ "My optional title" attribute1=value attribute2=value)

#### B.4.c. In-page links {#B4c}

In-page anchors can be accessed using the notation of B.4.b. replacing the URL by the section hash:

    [my section](#section-id)

See the **titles** section to learn how to define the hash reference of a part.

#### B.4.d. Special links {#B4d}

Some special treatments MAY be applied to special links such as email addresses. As these kinds
of links can evolve, there is no list of them here.

NOTE - For instance, in an HTML rendering, an email address should be transformed as a `mailto:...` link.

#### B.4.e. Referenced links {#B4e}

Links MUST allow the [References](#c4_references) notation.


### B.5. Images {#B5}

#### B.5.a. Inline images {#B5a}

Images can be written *inline* in the text, separated in two parts:

-   the image alternated text between brackets preceded by an exclamation point
-   then, between parenthesis, the URL of the image (relative or absolute) and an optional 
    title wrapped in double-quotes followed by a list of attributes if necessary.


    ![alt text](http://test.com/data1/images/1.jpg)

    ![alt text](http://test.com/data1/images/1.jpg "My optional title")

    ![alt text](http://test.com/data1/images/1.jpg "My optional title" class=myimageclass style="width: 40px;"

#### B.5.b. Referenced images {#B5b}

Images MUST allow the [References](#c4_references) notation.


### B.6. Footnotes {#B6}

Footnotes may be considered as a "special case" as we MAY allow writers to distinguish
simple footnotes from glossary and citations notes. The construction rules of these three
types MUST follow the same idea, with a special construction for glossary and citation
notes, which can be considered as special footnotes. Please refer to the [dedicated 
section](#notes-special-case) about notes.


C. Structural rules {#C}
------------------------

### C.1. Paragraphs {#C1}

To build a paragraph, just surround it between blank lines (at least one before and one after).

    Paragraph 1 ...
    
    Paragraph 2 ...

### C.2. Line breaks {#C2}

To insert a line break, write two or more spaces at the end of the line and pass to next line.

    Line 1 ...  
    Line 2 ...

### C.3. Horizontal rules {#C3}

To insert an horizontal, write at least three hyphens, asterisks or underscores alone on a line
(spaces MUST not care).

    ***
    ----
    _ _ _

### C.4. Titles {#C4}

Titles are built using two notations: the "atx" and the "sextet". HTML tags have a limit
of 6 levels (`h1` to `h6`) but a MDE parser MUST ignore this limit and be prepared for any
depth levels as writer requires in a document.

The titles list of a document MAY be accessible to build a "table of contents" quickly.
Global document's structure MUST be able to use both notations to build a single table of contents.

#### C.4.a. ATX: sharps titles {#C4a}

A "sextet" title is written alone on a single line, preceded by any sharps as the title level:

    # Title level 1 (HTML tag `h1`)

    ### Title level 3 (HTML tag `h3`)

Optionally, sextet titles can be "closed" using the same number of sharps at the end of the text.
The actual number of final sharps MUST NOT matter:

    ### Title level 3 (HTML tag `h3`) ##

#### C.4.b. Sextet: underlined titles {#C4b}

The "dash" notation only concerns the two first levels of titles in a document. They are written
underlined by equal signs for the first level and dashes for the second:

    Title level 1 (HTML tag `h1`)
    =============================

    Title level 2 (HTML tag `h2`)
    -----------------------------

NOTE - The underlining line MUST NOT require to be as long as the title text, any number of
equals or dashes MUST work.

ADVICE - If you know that a document will often be read "as-is" as plain text, the dashes notation
MAY be chosen preferably to the sextet one as it seems more comprehensive.


### C.5. Pre-formated texts {#C5}

#### C.5.a. Simple notation {#C5a}

A pre-formatted block is written as a paragraph beginning lines with 4 spaces (*the pipe 
of the example below is not included in the notation and represents line's 1st character*):

    |    a pre formed content

#### C.5.b. "Fenced" code blocks {#C5b}

A "fenced" code block can be written surrounded a content between two lines of tildes (at least 3):

    ~~~~
    My code here
    ~~~~

An information about the language used in the block can be defined following the first tildes by the 
language name (without space):

    ~~~~html
    My HTML code here
    ~~~~

NOTE - In an HTML implementation, this feature permits to create a *language friendly* code block, as 
[preconize the W3C in the HTML5 specifications][w3c-html5-code-specifications].


### C.6. Citations {#C6}

A blockquoted block is written preceding each line or only the first one of a paragraph by a superior sign `>`:

    > This is my blockquote,
    > where we can include **other Markdown** tags ...

    > We can also write our blockquotes
    without the superior sign on each line, but just at the begining of the first one.

Once a blockquote has begin (*e.g. as long as no blank line is passed*), the content will be part of it.

To precise the URL of the original content cited, write this URL at the begining of the first line
between parenthesis:

    > (http://test.com/) This is my blockquote,
    > with a content cited from the original "http://test.com" page ...

NOTE - Inside a blockquote content, writers MUST be allowed to use any other MDE rule (*a nested blockquote,
a list ...*).

### C.7. Lists {#C7}

#### C.7.a. Unordered lists {#C7a}

An un-ordered list is written beginning each entry by an asterisk, a plus sign or an hyphen followed by 3 spaces.
The character used for each item of a list MUST NOT matter:

    -   first item
    *   second item
        - first sub-item
        * second sub-item
    -   third item

#### C.7.b. Ordered lists {#C7b}

An ordered list is written beginning each entry by a number followed by 3 spaces. The number used 
for each item of a list MUST NOT matter:

    1.   first item
    1.   second item
        1. first sub-item
        1. second sub-item
    2.   third item

NOTE - A special attention MAY be attached when beginning a line with a raw dash, asterisk or plus or
with a number followed by a point. For instance, to write the raw string `123. My text`, the
point after the number MUST be escaped to not be parsed as an ordered list item:

    123\. My text

#### C.7.c. Multi-lins list items {#C7c}

Each list item can be written on multiple lines and only the first one MUST be indented.


### C.8. Terms definitions {#C8}

A definition is written separated in at least two parts:

- the term on the first line, with no leading space or character
- then, the definition beginning on the second line, with a leading double-points


    Apple
    :   Pomaceous fruit of plants of the genus Malus in
        the family Rosaceae.


### C.9. Tables {#C9}

#### C.9.a. Basic table {#C9a}

The basic table syntax is as simple as trying to build a visual table in plain text:

    | First Header  | Second Header    |
    | ------------- | ---------------- |
    | Content Cell  | Content *Cell*   |
    | Content Cell  | Content **Cell** |

The rules here are:

-   every table's line is written alone on a single line
-   the first lines are the headers of the table (most of the time one single line)
-   it is followed by a mandatory separators line of hyphens `-`
-   each line below is a line of the table content
-   columns are separated by pipes `|` and each line may have the same number of pipes
-   spacing is not important except for visual facility
-   we can write our tables without the leading pipes

Finally, the content of the cells can have other Markdown typographic features like emphasis.

#### C.9.b. Columns alignement {#C9b}

Alignment in columns can be specified by using colons `:` in the separators line:

-   a colon on the left of a separator's cell means a left-aligned column : `:---`
-   a colon on the right of a separator's cell means a right-aligned column : `---:`
-   two colons on the left and the right of a separator's cell means a centered column : `:--:`

    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  | **Cell**      | **Cell**     |
    | Content Cell  | **Cell**      | **Cell**     |

#### C.9.c. Cell grouping {#C9c}

To build cell groups (one cell over more than one column) we write as many final pipes as the content 
must cover columns, without spaces:

    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |

NOTE - Cell grouping MUST be allowed in lines of content AND header line(s).

#### C.9.d. Table caption {#C9d}

Table caption is written between brackets just before or just after the table, on a new single line:

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    [ my table caption ]

#### C.9.e. Table with multiple bodies {#C9e}

Separate sets of content for a single table are written separating them with one blank line:

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    
    | New section   |   More        |         Data |
    | And more      |           And more          ||

NOTE - In HTML, the result should be a table with two `tbody` sections.


D. Miscellaneous rules {#D}
---------------------------

### D.1. Metas data {#D1}

Meta-data can be added to an MDE document when necessary ; it can be the case to specify
a special title for the document, its author or any kind of "meta" information.

A meta-data is added writing it at the very top of the document (without any blank line from
the top) as a `var: val` pair:

    author: John Doe
    
Multiple meta-data can be written, beginning each item on a new line, and the "true" content 
of the document MUST begin after passing at least one blank line after meta-data.

The value of the meta-data MUST allow multi-lines content.


### D.2. Escaping of meta-characters {#D2}

Escaping a meta-character in MDE only consists in preceding it by a "back-slash" `\`.

The following characters MUST be escaped to be rendered as the raw character they are:

-   `\\` : the backslash itself
-   `\.` : the dot
-   `\!` : the exclamation point
-   `\#` : the hash mark
-   `\*` : the asterisk
-   `\+` : the plus sign
-   `\-` : the hyphen
-   `\_` : the underscore
-   `\`` : the backtick quote
-   `\(\)` : the parentheses
-   `\[\]` : the brackets
-   `\{\}` : the curly brackets


### D.3. References {#D3}

The idea of the "references" comes from the first idea of Markdown: let the content readable "as is".

So, in some cases, it is most relevant to move an information on a single line anywhere in the
document (at its bottom for instance) and only insert its ID at its final place.

The global construction of references is to replace the content by an ID and write that
content on another line anywhere:

    This is a paragraph with a [referenced link][linkid] ...
    
    ...

    [linkid]: http://test.com/ "My optional title"

In the case above, the final rendering MUST be exactly the same as if it was written like:

    This is a paragraph with a [referenced link](http://test.com/ "My optional title") ...
    
    ...

### D.4. Mathematics {#D4}

One of the goal of MDE (and globally the Markdown syntax) is to write documentation. In this
idea, MDE parsers MUST be prepared to handle complex mathematical notations.

NOTE - The final rendering of the mathematical notations can be the scope of a third-party
application but an MDE parser MUST integrate such third-party natively.

#### D.4.a. Inline mathematics {#D4a}

Inline mathematics is written by surrounding the content between escaped parenthesis:

    \(...\)
    \(\alpha = (t_1 - t_0)/L\)

#### D.4.b. Block of mathematics {#D4b}

Block of mathematics formula is written surrounding the content between escaped brackets
(additionally to blank lines):

    \[...\]
    \[\Delta = \frac{\partial U^*}{\partial F} = \frac{12F}{Eb} \int_0^L \frac{x^2}{(t_0 + \alpha x)^3} dx\]

#### D.4.c. Mathematics formula notation {#D4c}

Inline and block mathematical contents (the part inside both wrappers described above) MUST 
follow the [LaTeX syntax][latex-maths-doc].


### D.5. The special case of notes {#D5}

Footnotes in a text are a way to increase the meaning of it, the external references, 
some required definitions for the comprehension of that text without overcroweded it, etc.
They are often used in books and official contents.

Let's try to explain footnotes usage and differences between:

-   **a simple footnote**, a short additional content that would have no place in the content, 
-   **a glossary note**, an explanation about a technical term for example, 
-   **a bibliographic note**, which refer to another book or work, hardly referenced to let the 
    lector find its original source.

#### D.5.a. Footnotes {#D5a}

As said above, footnotes are just snippets of additional information that seems not necessary
in the content. For example, if we talk about *Linux* in a text about a specific computer, 
it may not makes sense to cite *Linus Trovalds* in the content. But we do want Linus'name 
to be present in our work, so we add a little note attached to the term "Linux", which can be:

    This computer is compatible with the operating system Linux[^xxx].
    
    [^xxx]: An open source operating system created by Linus Trovalds.

#### D.5.b. Glossary notes {#D5b}

A glossary note is most like a definition. It is attached to a specific term and try to give 
one or more explanations of it. Glossary notes have to be considered as *definitions list* 
in HTML, except that they will all be placed like footnotes at the end of the content.

For example, if we want to define the term "Linux" as a glossary entry, we will add 
a marker attached to all occurences of the term, which will reach the footnote definition:

    This computer is compatible with the operating system Linux[^xxx].
    
    [^xxx]: glossary: Linux
    recursive acronym for "Linux Is Not UniX"

The point here is that the content always starts with `glossary:`. Then we write the term 
to be defined, followed by an optional *short key* which will be used to later the sorting 
order of the glossary. Then the definition is on a new line.

#### D.5.c. Citation notes {#D5c}

A bilbliographic note is a fully referenced external work. This kind of notes is often used 
in academic or scientific work. The point is that we have to follow some *academic rules* 
for bibliographic notes, such as naming the authors, writing the title of the work in italic, 
exactly as it has been published, and cite enough informations (*such as the edition*) 
to let the lector find this work easily.

For example, if we talk about the creation of Linux and want to add a reference to the 
very first work of it, we would attach a note after the expression "creation of Linux" 
which could be:

    This computer is compatible with the operating system Linux[p. XX][#Doe:1991].
    
    [#Doe:1991]: Linus Benedict Torvalds (October 5, 1991). *Free minix-like kernel sources for 386-AT*.
    comp.os.minix. (Web link) Retrieved September 30, 2011.

As we can see, the circumflex is replaced by a sharp `#` and the marker is two-parts handlhed.


### D.6. Implementors specifics {#D6}

#### D.6.a. Error handling {#D6a}

#### D.6.b. Structural tags {#D6b}

    {% TOC %}
    {% NOTES %}

#### D.6.c. Various {#D6c}

##### D.6.c.1. Inline HTML {#D6c1}

#### D.6.c.2. Other file inclusion {#D6c2}



[wiki-markdown]: http://en.wikipedia.org/wiki/Markdown
[wiki-john-gruber]: http://en.wikipedia.org/wiki/John_Gruber
[wiki-aaron-swartz]: http://en.wikipedia.org/wiki/Aaron_Swartz
[package-home]: http://github.com/markdown-extended/manifest
[package-issues]: http://github.com/markdown-extended/manifest/issues
[daring-fireball]: http://daringfireball.net/
[michel-fortin]: http://michelf.com/
[fletcher-penney]: http://fletcherpenney.net/
[egil-hansen]: http://egilhansen.com
[piwi]: http://github.com/piwi
[markdown]: http://daringfireball.net/projects/markdown/
[markdown-extra]: https://michelf.ca/projets/php-markdown/
[multi-markdown]: http://fletcherpenney.net/multimarkdown/
[php-markdown-extra-extended]: http://github.com/egil/php-markdown-extra-extended
[markdown-manual]: http://daringfireball.net/projects/markdown/syntax
[github]: http://github.com
[github-fork-doc]: http://help.github.com/articles/fork-a-repo
[github-pull-doc]: http://help.github.com/articles/using-pull-requests
[latex-maths-doc]: https://en.wikibooks.org/wiki/LaTeX/Mathematics
[w3c-html5-code-specifications]: http://dev.w3.org/html5/spec-author-view/the-code-element.html#the-code-element
[cc-by-3]: http://creativecommons.org/licenses/by/3.0/
[iso-639-1]: http://www.loc.gov/standards/iso639-2/php/code_list.php
[rfc-2119]: http://tools.ietf.org/html/rfc2119
[^forking]: GitHub embeds many tools and procedures to allow a quick and simple "*fork/pull request*" process.
