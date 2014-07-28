Markdown Extended Manifest
==========================

* version: 1.0-alpha
* source: http://github.com/markdown-extended/manifest

Summary
-------

This document explains the "official" specifications of the *Markdown Extended* 
("**MDE**" in the rest of this document) syntax. It intends to be a concise and complete set 
of syntax's rules and tags to use to write in Markdown and to build parsers implementations.
It can be considered as the **MDE's reference** for any puprose.

Presentation
------------

**[Markdown][]** is originally a plain text formatting syntax created by [John Gruber][]
and [Aaron Swartz][]. It allows to write contents with an easy-to-read, easy-to-write set
of rules for plain text format then convert it (basically in HTML) in a reach format.

Many developers have proposed their own implementation of the original syntax with specific
evolutions and extensions. The goal of **MDE** is to define an official and homogeneous new
version, the most complete and rich as possible, while keeping only the relevant developments
or more used rules. **MDE MUST be considered by developers as the new standard for Markdown,
so that each user does not need to adapt to the current implementation but can use these rules 
everywhere.**

Introduction
------------

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", 
"RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be interpreted as described in 
[RFC 2119](http://tools.ietf.org/html/rfc2119).

The present specifications of the syntax DOES NOT suppose about the final rendering of the 
Markdown content. This rendering is the purpose of the *parsers* and specific applications.
The "HTML" final output can be used as a rendering example but MAY NOT be a specification reference.

Each item of the section below is identified by a structural ID composed like `A.B.C.` 
to allow it to be referenced and used in citations, implementations, documentations etc.

These specifications are opened for discussion. If you want to correct a thing or propose 
your vision of a part of them, please see the [contribute](#contribute) section of this document.

Markdown Extended specifications
-------------------------------- 

The syntax's rules below are separated in the following three types based on their utility:

**Typography**
:	Rules concerning the rendering of typographic writing usages, such as bold
	text or links ; this almost concerns a word, a group of words or an expression.

**Structure**
:	Rules concerning a special rendering of a sentence or a group of sentences,
	such as citations or pre-formated blocks.

**Miscellaneous**
:	Any rule that can not be classified in the two first categories.

### First notes

The sections below will explain each tag to use for each writing rule. As a very first introduction
to the MDE syntax, we MUST ALWAYS keep the following basis in mind:

-   **a Markdown content is written as plain text**: it MUST be working by any software reading 
    file (such as `vi`) and be readable by a human "as-is" (this is the very first goal of Markdown)
-   as Markdown rules are written using some specific characters, **these characters MAY be escaped**
    to be used "as-is" (this is developed below)
-   **a paragraph is created in Markdown passing a blank line** (this rule is developed below)
-   **all the rules MUST be used in one single Markdown content**, and be parsed correctly
    (any conflict between rules MUST be avoided)
-   for convenience, **the "references" notation MUST be allowed for a maximum of rules**
    (this notation is explained below) as it permits to keep a content readable.

### A. Typographic rules

A rule is considered as *typographic* when it only concerns one or more words written inline
in a text. As long it does not concern a full block of text, a rule MUST be considered as *typographic*.

#### A.1. Emphasis

Bold and italic text emphasis MUST keep simple to use and read. The first idea was kept about
these effects allowing two different typeface: the *underscore* (A.1.a.) and the *wildcard* (A.1.b.).

##### A.1.a. Emphasis with underscores

Italic text is written surrounded by one character:

    _italic_

Bold text is written surrounded by two characters:

    __bold__

NOTE - In-words underscores MAY NOT be considered as emphasis delimiters ; for instance, 
writing `my_underscored_words`, the `underscored` word MAY NOT be in italic but the whole
expression MAY be kept "as-is". In other words, writing `__my_underscored_words__` MAY be
rendered as the expression `my_underscored_words` written in bold text (*leading and trailing
characters are considered as emphasis delimiters but internal characters are auto-escaped*).
This rule is important in a case like `underscored_words followed by other_underscores`
as it seems easier to let a parser match the two distant underscores as delimiters while this
MAY NOT be the case (*underscores may be kept "as-is" in both expressions*).

##### A.1.b. Emphasis with wildcards

Italic text is written surrounded by one character:

    *italic*

Bold text is written surrounded by two characters:

    **bold**

#### A.2. Abbreviations

Abbreviations MUST allow the [References](#c4_references) notation.

#### A.3. Code and variable names

Inline code and variables MUST keep simple to use and read. The first idea was kept about
this span: surround the code or variable name between *ticks*. A code span MUST allow spaces
inside.

    This variable `$var` can be accessed using `-> get(...)` method

#### A.4. Links

A *link* concerns any kind of *hypertext link* (a full URL), in-page link (a hash tag referencing
a section of current document) and any other kind of "clickable" thing in an HTML content,
such as an email address, a phone number etc.

Standalone URLs MUST NOT be automatically transformed in links if they are not written following one 
of the below rules. An URL written inline in a content with no specific "link" tag is not a link, it
is just a raw URL (in an HTML content, it MAY NOT be clickable).

Links MUST allow the [References](#c4_references) notation.

##### A.4.a. Raw inline links

Making an URL (or any kind of text) clickable can be done by surrounding it between inferior and 
superior signs:

    <http://link.com/query>

Any text written like that MUST be rendered clickable (with a special treatment if required,
such as email adresses links).

##### A.4.b. Inline links

Links can be written *inline* in the text, separated in two parts:

-   the link text between brackets
-   then, between parenthesis, the URL of the link (relative or absolute) and an optional 
    title wrapped in double-quotes followed by a list of attributes if necessary.

    [a simple link](http://test.com/)

    [a link with a title](http://test.com/ "My optional title")

    [a link with a title and some attributes](http://test.com/ "My optional title" attribute1=value attribute2=value)

##### A.4.c. In-page links

In-page anchors can be accessed using the notation of A.4.b. replacing the URL by the section hash:

    [my section](#section-id)

See the **titles** section to learn how to define the hash reference of a part.

##### A.4.d. Special links

Some special treatments MAY be applied to special links such as email addresses. As these kinds
of links can evolve, there is no list of them here.

For instance, in an HTML rendering, an email address should be transformed as a `mailto:...` link.

#### A.5. Images

##### A.5.a. Inline images

Images can be written *inline* in the text, like:

    This is a paragraph with an embedded image ![alt text](http://test.com/data1/images/1.jpg "My optional title")

The rule here is the same as for inline links except that it bagin with an exclamation point. Then, between brackets, the alternative text (*displays if the image can't be loaded*) followed by, between parenthesis, the URL of the image, relative or asbolute, and an optional title wrapped in double-quotes.

Using this notation is the basic syntax for images. But it can make the file not easy to read, which is the first goal of Markdown.

So we can use **references** for images. This allows us to keep the URL and other informations about the image outside the content. For example:

    This is a paragraph with a referenced image ![alt text][imageid]. I can continue my content 
    clearly because it is still readable for human eyes ...

    ![imageid]: http://test.com/data1/images/1.jpg "My optional title"

The image here in the final content will be exactly the same as above. The point is just that the informations are not in the content but after it.

A new feature introduced by Fletcher Penney in he's *Multi Markdown* version is the possibility to add attributes in references. Doing so, you can add, after the optional title, any attributes constructed like couples of pair `variable/value` with or without double-quotes. For example:

    This is a paragraph with a referenced image ![alt text][imageid]. I can continue my content 
    clearly because it is still readable for human eyes ...

    ![imageid]: http://test.com/data1/images/1.jpg "My optional title" class=myimageclass style="width: 40px;"

As I said, the class will produce an image tag like:

    <img src="http://test.com/data1/images/1.jpg" alt="alt text"
        title="My optional title" class="myimageclass" style="width:40px;" />

For now, you may write the entire reference definition on a single line. This is not the case in Multi Markdown, which allows to pass a line, but I can't get this feature working for now. This may be one of the evolutions ...

Images MUST allow the [References](#c4_references) notation.

#### A.6. Footnotes

Footnotes may be considered as a "special case" as we MAY allow writer to distinguish
simple footnotes of glossary and citations notes. The construction rules of these three
types MAY be follow the same idea, with a special construction for glossary and citation
notes, whish can be considered as a special footnote. Please refer to the [dedicated 
section](#notes-special-case) about notes.

### B. Structural rules

#### B.1. Paragraphs

#### B.2. Titles

Global document's structure MAY be able to use both notations to build a single table
of contents.

#### B.3. Pre-formated texts

#### B.4. Citations

To create a blockquoted block, we just preceed each line or the first of a paragraph by a superior sing `>`.

    > This is my blockquote,
    > where we can include **other Markdown** tags ...

    > We can also write our blockquotes
    without the superior sign on each line, but just at the begining of the first one.

Basically, once we are in a blockquote block (*e.g. as no blank line is passed*), our content will be part of it.

I've found not so long ago an interesting feature added to this original syntax imagines by [**Egil Hansen**](http://egilhansen.com) for his [php-markdown-extra-extended](http://github.com/egil/php-markdown-extra-extended) version to precise the URL of the original content cited. To do so, we just have to write this URL at the begining of the first line.

    > (http://test.com/) This is my blockquote,
    > with a content cited from the original "http://test.com" page ...

This will produce:

    <blockquote cite="http://test.com">
    This is my blockquote, with a content cited from the original "http://test.com" page ...
    </blockquote>

#### B.5. Lists

##### B.5.a. Unordered lists

##### B.5.b. Ordered lists

#### B.6. Terms definitions

#### B.7. Tables

The first table syntax was (*as I know*) introduced by Michel Fortin in he's *Markdown Extra* version. He imagines a visual syntax like:

    | First Header  | Second Header |
    | ------------- | ------------: |
    | Content Cell  | Content Cell  |
    | Content Cell  | Content Cell  |

The rules here are that every table's line is written alone on a single line. The very first line is the header of the table (*thead*), followed by a mandatory separators line of hyphens `-`. Then, each line of the table content is written on a single line (*tbody*). Columns are separated by pipes `|` and each line may have the same number of pipes. Spacing is not important except for visual facility and we can write our tables without the leading pipes. Finally, the content of the cells can have other Markdown span features like emphasis.

This syntax is basic but it feets the original Markdown's goal (*to keep a file content human readable*).

Michel has constructed an advanced feature to manage **alignment in columns** by using colons `:` in the separators line :

- a colon on the left of a separator's cell means a left-aligned column : `:---`
- a colon on the right of a separator's cell means a right-aligned column : `---:`
- two colons on the left and the right of a separator's cell means a centered column : `:--:`

Fletcher Penney, in he's *Multi Markdown* version, pushed the table structure one step higher by allowing **multi-header lines** and **multi-columns cells**. Let's look an example :

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |

The result here will be a two lines header and, for example in the first line, a second cell containing "Grouping" on two columns (*this will be build in HTML with the attribute `colspan=2`*).

The point, simple to understand and use, is that we write as many pipes (*without spaces*) as our content must cover columns. Easy and powerful ...

Another new feature of Fletcher's work is that we can precise a **caption** for our table. To do so, we just write it between brackets just before or just after the table, on a single line. In the above example, it can be:

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    [ my table caption ]

Finally, Fletcher's imagines an high level of HTML construction allowing to write separate sets of content for each table, separating them by a blank line:

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    
    | New section   |   More        |         Data |
    | And more      |           And more          ||

The result will be a table with two `tbody` sections.

#### B.8. Code blocks

A basic code block can be written starting each line by 4 spaces:

    This is a classic paragraph ...

        and this is a "pre formatted" code block, wrapped in <pre><code> HTML tags

You can include any other Markdown tag in a code block, as long as each line starts with 4 spaces.

Michel Fortin, in his *Markdown Extra* version, added a special writing rule to create code blocks without spaces at the starting of the lines. He imagines to wrap the block content between two lines of 3 or more tildes `~`.

    ~~~~
    My code here
    ~~~~

This way you can write some code blocks not counting every spaces of each line (...).

I've found not so long ago an interesting feature added to this fenced syntax imagines by [**Egil Hansen**](http://egilhansen.com) for his [php-markdown-extra-extended](http://github.com/egil/php-markdown-extra-extended) version to create some *language-friendly* code blocks, as it is [preconize by the W3C](http://dev.w3.org/html5/spec-author-view/the-code-element.html#the-code-element) in the HTML5 specifications. To do so, we just have to write our language just at the end of the first tildes line.

    ~~~~html
    My code here
    ~~~~

Be carefull here, a difference with Egil's version in *Extended Markdown* is that your language name must be just after the last tilde, with no space.

The code above will produce:

    <pre><code class="language-html">My code here</code></pre>


### C. Miscellaneous rules

#### C.1. Metas

#### C.2. Escaping of meta-characters

#### C.3. Inline HTML

#### C.4. References


Using this notation is the basic syntax for links. But it can make the file not easy to read, which is the first goal of Markdown.

So we can use **references** for links. This allows us to keep the URL and other informations about the link outside the content. For example:

    This is a paragraph with a [referenced link][linkid]. I can continue my content 
    clearly because it is still readable for human eyes ...

    [linkid]: http://test.com/ "My optional title"

The link here in the final content will be exactly the same as above. The point is just that the informations are not in the content but after it.

A new feature introduced by Fletcher Penney in he's *Multi Markdown* version is the possibility to add attributes in references. Doing so, we can add, after the optional title, any attributes constructed like couples of pair `variable/value` with or without double-quotes. For example:

    This is a paragraph with a [referenced link][linkid]. I can continue my content 
    clearly because it is still readable for human eyes ...

    [linkid]: http://test.com/ "My optional title" class=mylinkclass style="border:1px solid black"

As I said, the class will produce an link tag like:

    <a href="http://test.com/" title="My optional title" 
        class="mylinkclass" style="border:1px solid black">
            referenced link</a>

For now, you may write the entire reference definition on a single line. This is not the case in Multi Markdown, which allows to pass a line, but I can't get this feature working for now. This may be one of the evolutions ...



#### C.5. Implementors specifics

### D. The special case of notes {#notes-special-case}

Footnotes in a text are a way to increase the meaning of it, the external references, 
some required definitions for the comprehension of that text without overcroweded it, etc.
They are often used in books and official contents.

Let's try to explain footnotes usage and differences between:

-   **a simple footnote**, a short additional content that would have no place in the content, 
-   **a glossary note**, an explanation about a technical term for example, 
-   **a bibliographic note**, which refer to another book or work, hardly referenced to let the 
    lector find the source.

#### Footnotes

As said above, footnotes are just snippets of additional informations that seems not necessary
in the content. For example, if we talk about *Linux* in a text about a specific computer, 
it may not makes sense to cite *Linus Trovalds* in the content. But we do want Linus'name 
to be present in our work, so we add a little note attached to the term "Linux", which can be:

    This computer is compatible with the operating system Linux[^xxx].
    
    [^xxx]: An open source operating system created by Linus Trovalds.

Which MAY render:

>    This computer is compatible with the operating system Linux[^1].
    
[^1]: An open source operating system created by Linus Trovalds.

#### Glossary notes

A glossary note is most like a definition. It is attached to a specific term and try to give 
one or more explanations of it. Glossary notes have to be considered as *definitions list* 
in HTML, except that they will all be placed like footnotes at the end of the content.

For example, if we want to define the term "Linux" as a glossary entry, we will add 
a marker attached to all occurences of the term, which will reach the footnote definition:

    This computer is compatible with the operating system Linux[^xxx].
    
    [^xxx]: glossary: Linux
    recursive acronym for "Linux Is Not UniX"

Which MAY render:

>    This computer is compatible with the operating system Linux[^linux].
    
[^linux]: glossary: Linux
recursive acronym for "Linux Is Not UniX"

The point here is that the content always starts with `glossary:`. Then we write the term 
to be defined, followed by an optional *short key* which will be used to later the sorting 
order of the glossary. Then the definition is on a new line.

#### Citation notes

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

Which MAY render:

>    This computer is compatible with the operating system Linux[p. XX][#Doe:1991].
    
[#Doe:1991]: Linus Benedict Torvalds (October 5, 1991). *Free minix-like kernel sources for 386-AT*.
comp.os.minix. (Web link) Retrieved September 30, 2011.

As we can see, the circumflex is replaced by a sharp `#` and the marker is two-parts handlhed.


Links
-----

The original idea of the Markdown syntax came from [John Gruber](http://daringfireball.net/),
who defined its goal, the first Markdown syntax rules and coded a first parser
as a *Perl* script.

An extended implementation, **Markdown Extra**, has been written by [Michel Fortin](http://michelf.com/),
coded in *PHP* script.

Another extended implementation, **Multi Markdown**, has been written by 
[Fletcher T. Penney](http://fletcherpenney.net/), coded in *Perl* script.

About
-----

The Markdown Extended specification is authored and maintained by Pierre Cassat ([@pierowbmstr](http://github.com/piwi)).

If you'd like to leave feedback, please [open an issue on GitHub](http://github.com/markdown-extended/manifest/issues).

Contribute
----------

This document and the MDE's specification are opened for any kind of discussion,
argumentation, translation and any other modification. The source of this document
is under a GIT version-control repository publicly hosted on [GitHub](http://github.com).
If you want to participate in any way, just [fork and edit](http://help.github.com/articles/fork-a-repo)
the original repository and ask for a [pull request](http://help.github.com/articles/using-pull-requests)
opening the appropriate issue ticket[^forking].

License
-------

This document is licensed under Creative Commons - CC BY 3.0
<http://creativecommons.org/licenses/by/3.0/>.

>   Copyleft 2014 Pierre Cassat & contributors

>   see <http://github.com/markdown-extended/manifest>


[Markdown] http://en.wikipedia.org/wiki/Markdown
[John Gruber] http://en.wikipedia.org/wiki/John_Gruber
[Aaron Swartz] http://en.wikipedia.org/wiki/Aaron_Swartz
[^forking]: GitHub embeds many tools and procedures to allow a quick and simple "*fork/pull request*" process.
