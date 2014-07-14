Markdown Extended Manifest
==========================

* version: 1.0-alpha
* source: http://github.com/markdown-extended/manifest

Summary
-------

This document explains the "official" specifications of the (unofficial) *Markdown Extended* 
("**MDE**" in the rest of this document) syntax. It intends to be a concise and complete set 
of syntax's rules and tags to use to write in Markdown and to build parsers implementation.
It can be considered as the **MDE's reference** for any puprose.

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

Markdown Extended specification
-------------------------------

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

Images can be *inline* in the text, like:

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

#### A.5. Links

Links can be *inline* in the text, like:

    This is a paragraph with a [link to a test page](http://test.com/ "My optional title") for now ...

The rule here is to write the link text between brackets. Then, between parenthesis, the URL of the link, relative or asbolute, and an optional title wrapped in double-quotes.

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


[^forking]: GitHub embeds many tools and procedures to allow a quick and simple "*fork/pull request*" process.
