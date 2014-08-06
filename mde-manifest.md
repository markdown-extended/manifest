Markdown Extended specifications
================================ 

* version: 1.0-alpha
* source: http://github.com/markdown-extended/manifest

----

**Please note that this document is still a DRAFT of the final specifications: some work
remains before the first published version and all its content may change before this publication.**

TODOS

- global cleanup
- english !!

----

This document explains the "official" specifications of the *Markdown Extended* syntax
("**MDE**" in the rest of this document). It intends to be a concise and complete set 
of syntax's rules and tags to use to write under Markdown Extended and a reference to build 
parsers  implementations. It can be considered as the **MDE's reference** for any purpose.
The goal of these specifications is NOT to explain *how to write a content* but *how to
build a content*  using the MDE's syntax.

This document is authored and maintained by Pierre Cassat ([@pierowbmstr][piwi])
and licensed under [Creative Commons - CC BY 3.0][cc-by-3]. It is opened for discussion
or contribution, please refer to [the dedicated section](#contribute).

**Table of contents:**

-   [Introduction](#introduction)
-   [Origins of Markdown Extended](#origins-of-markdown-extended)
-   [Scope of these specifications](#scope-of-these-specifications)
-   [Terms and definitions](#terms-and-definitions)
-   [A. Basic concepts](#A)
    -   [A.1. Intention](#A1)
    -   [A.2. Global construction](#A2)
    -   [A.3. MDE file format](#A3)
    -   [A.4. Rules ranking](#A4)
    -   [A.5. Blank lines](#A5)
    -   [A.6. Indentation](#A6)
    -   [A.7. Automatic escaping](#A7)
    -   [A.8. Inline HTML](#A8)
        -   [A.8.a. Use with caution](#A8a)
        -   [A.8.b. HTML comments](#A8b)
    -   [A.9. Identifiers](#A9)
-   [B. Typographic rules](#B)
    -   [B.1. Application scope](#B1)
    -   [B.2. Emphasis](#B2)
        -   [B.2.a. Emphasis with underscores](#B2a)
        -   [B.2.b. Emphasis with asterisks](#B2b)
        -   [B.2.c. Emphasis auto-escaping](#B2c)
    -   [B.3. Abbreviations](#B3)
    -   [B.4. Code and variable names](#B4)
    -   [B.5. Links](#B5)
        -   [B.5.a. Automatic links](#B5a)
        -   [B.5.b. Raw inline links](#B5b)
        -   [B.5.c. Inline links](#B5c)
        -   [B.5.d. In-page links](#B5d)
        -   [B.5.e. Special links](#B5e)
        -   [B.5.f. Referenced links](#B5f)
    -   [B.6. Images](#B6)
        -   [B.6.a. Inline images](#B6a)
        -   [B.6.b. Referenced images](#B6b)
    -   [B.7. Footnotes](#B7)
    -   [B.8. Inline mathematics](#B8)
-   [C. Structural rules](#C)
    -   [C.1. Application scope](#C1)
    -   [C.2. Paragraphs](#C2)
    -   [C.3. Line breaks](#C3)
    -   [C.4. Horizontal rules](#C4)
    -   [C.5. Titles](#C5)
        -   [C.5.a. ATX: sharps titles](#C5a)
        -   [C.5.b. Setext: underlined titles](#C5b)
    -   [C.6. Pre-formatted texts](#C6)
        -   [C.6.a. Simple notation](#C6a)
        -   [C.6.b. Fenced code blocks](#C6b)
    -   [C.7. Citations](#C7)
    -   [C.8. Lists](#C8)
        -   [C.8.a. Unordered lists](#C8a)
        -   [C.8.b. Ordered lists](#C8b)
    -   [C.9. Terms definitions](#C9)
    -   [C.10. Tables](#C10)
        -   [C.10.a. Basic table](#C10a)
        -   [C.10.b. Columns alignment](#C10b)
        -   [C.10.c. Cell grouping](#C10c)
        -   [C.10.d. Table ID](#C10d)
        -   [C.10.e. Table caption](#C10e)
        -   [C.10.f. Table with multiple bodies](#C10f)
    -   [C.11. Mathematics blocks](#C11)
    -   [C.12. Images blocks](#C12)
-   [D. Miscellaneous rules](#D)
    -   [D.1. Meta data](#D1)
    -   [D.2. Escaping of meta-characters](#D2)
    -   [D.3. References](#D3)
        -   [D.3.a. Basis of references](#D3a)
        -   [D.3.b. Various types of references](#D3b)
    -   [D.4. Mathematics](#D4)
    -   [D.5. The special case of notes](#D5)
        -   [D.5.a. Footnotes](#D5a)
        -   [D.5.b. Glossary notes](#D5b)
        -   [D.5.c. Citation notes](#D5c)
    -   [D.6. User defined attributes](#D6)
        -   [D.6.a. Tags attributes](#D6a)
        -   [D.6.b. Raw attributes](#D6b)
    -   [D.7. Identifiers construction](#D7)
    -   [D.8. Automatic indexes](#D8)
        -   [D.8.a. Table of contents](#D8a)
        -   [D.8.b. Table of figures and tables](#D8b)
    -   [D.9. Implementers specifics](#D9)
        -   [D.9.a. Error handling](#D9a)
        -   [D.9.b. Structural tags](#D9b)
        -   [D.9.c. User configuration](#D9c)
        -   [D.9.d. Various](#D9d)
            -   [D.9.d.1. Other file inclusion](#D9d1)
            -   [D.9.d.2. Critic markup](#D9d2)
-   [Contribute](#contribute)
-   [Testing](#testing)


Introduction
------------

**[Markdown][wiki-markdown]** is originally a plain text formatting syntax created by 
[John Gruber][wiki-john-gruber] and [Aaron Swartz][wiki-aaron-swartz]. It allows to write some contents
with an easy-to-read, easy-to-write set of rules for plain text format then to convert it in a rich format
(basically HTML).

Many developers have proposed their own implementation of the original syntax with specific
evolutions and extensions. The goal of **MDE** is to define an official and homogeneous new
version, as complete and rich as possible, while keeping only the relevant evolutions
or more used rules. **MDE can be considered by developers as the new standard for Markdown,
so that each user does not need to adapt to the current implementation but can use these rules 
everywhere.**


Origins of Markdown Extended
----------------------------

The original idea of the Markdown syntax came from [John Gruber][daring-fireball],
who defined its goal, the first Markdown syntax rules and coded a first parser
as a *Perl* script. He also wrote [the first manual][markdown-manual].

Working on these specifications, the following implementations inspired us:

-   [**Markdown Extra**][markdown-extra], written by [Michel Fortin][michel-fortin], coded in *PHP* script
-   [**Multi Markdown**][multi-markdown], written by [Fletcher T. Penney][fletcher-penney], coded in *Perl* script
-   [**PHP Markdown Extra Extended**][php-markdown-extra-extended], written by [Egil Hansen][egil-hansen], coded in *PHP* script


Scope of these specifications
-----------------------------

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", 
"RECOMMENDED", "MAY" and "OPTIONAL" in this document are to be interpreted as described in 
[RFC 2119][rfc-2119]. By extension, any word in capital letters SHOULD be understood in its
literal meaning.

The present specifications of the syntax DOES NOT suppose about the final rendering of the 
content. This rendering is the purpose of the *parsers* and specific applications. The "HTML" 
final output CAN be used as a rendering example but MUST NOT be a specification reference.

Each item of the sections below is identified by a structural ID composed like `A.B.C.` 
to allow it to be referenced and used in citations, implementations, documentations etc.


Terms and definitions
---------------------

For the purposes of this document, the following terms and definitions apply:

**blank line** - a "blank line" in MDE is any line that does not output anything ; this concept
is developed in [§§](#A5).

**meta characters** - Any character used in at least one rule of the syntax is considered as a
"meta" character ; they are listed in the list below.

**meta data** - A "meta-data" is a piece of information written in a document (or loaded by
parsers) but not actually rendered in final output ; this concept is developed in [§§](#D1).

**reference** - A reference is a mark of any kind that refers to a definition written elsewhere 
in the document (at its bottom for instance) ; this concept is developed in [§§](#D3).

**indentation** - In MDE like in many other languages, the "indentation" is made by writing
a *tabulation* OR *four spaces* from last indentation limit (originally the left side of the 
document, which is the "indentation zero" limit) ; this concept is developed in [§§](#A6).

**writer** - In these specifications, "writer" designates the "user", the persons who
write contents using the MDE syntax.

**parser** - In these specifications, "parser" designates the application in charge to treat
the original MDE content and transform it in a rich language ; the final rendering MUST NOT
be important while reading the specifications.

**implementation** - This designates the same as "parser".

**configuration** - This designates an optional set of options a parser can accept to define
some of its behaviors.

Below is a list of all meta-characters used for tags in MDE:

-   `\` : the backslash
-   `.` : the dot
-   `:` : the colon
-   `!` : the exclamation point
-   `#` : the hash mark or "sharp"
-   `*` : the asterisk or "wildcard"
-   `+` : the plus sign
-   `-` : the hyphen or "dash" or minus sign
-   `_` : the underscore
-   `\`` : the backtick quote
-   `|` : the pipe
-   `(` and `)` : the parentheses
-   `[` and `]` : the brackets
-   `{` and `}` : the curly brackets
-   `<` and `>` : the angle brackets or "chevrons"


A. Basic concepts {#A}
----------------------

The sections below will explain each tag to use for each writing rule. As a very first introduction
to the MDE syntax, we MUST ALWAYS keep the following basis in mind:

-   **a Markdown content is written as plain text**: 
    -   it MUST be working by any software reading file (such as `vi`)
    -   it MUST be readable by a human "as-is" (this is the very first goal of Markdown)
-   as Markdown rules are written using some specific characters, **these characters MAY be escaped**
    to be used "as-is" (this is developed in [§§](#D2))
-   **a paragraph is created in Markdown passing a blank line** (this rule is developed in [§§](#C2))
-   **all the rules MUST be used in one single Markdown content** and be parsed correctly
    (any conflict between rules MUST be avoided)
-   for convenience, **the "references" notation MUST be allowed for a maximum of rules**
    (this notation is explained in [§§](#D3)) as it permits to keep a content readable.

For information, developers and webmasters can use the [*Markdown Mark* icon created by Dustin Curtis][markdown-mark]
to identify MDE files and syntax.

### A.1. Intention {#A1}

The MDE rules MUST keep ALL original Markdown's rules valid.

As said in the *scope of these specifications* ([§§](#scope-of-these-specifications)),
we WILL NOT give rendering rules here, each parser MAY follow its own final rendering rules
according to the MDE specifications (concerning the original MDE content) and concerned language.
Thus, we MUST keep in mind that the final output MAY NOT be HTML only ; a parser can construct any 
format of output (such as PDF, OpenDocument etc). This is a major difference with the original 
John Gruber's Markdown parser, which only constructs HTML output.

### A.2. Global construction {#A2}

The master idea of Markdown is the **readability** of the content. Which means: if I have a Markdown file
and I open it with a program like `less` or `vi` (or any program that render a file "as is"), I MUST
be able to read its content with no other action.

This idea basically means two things:

1.  the semantic tags used to finally build a rich content SHOULD NOT prevent a clear reading
    of that content
2.  a reader SHOULD have to only scroll down to continue reading (right/left scroll SHOULD be avoided)

Keeping readability using the semantic tags of the syntax is the purpose of these specifications ;
we will here try to define the best rules to NOT prevent a clear reading but DO allow a maximum
of rich final rendering. Keeping a document "one way scroll only" is made simple by the global
construction of a Markdown content: the real *end of lines* of the content ARE NOT the final
ones. Writers CAN, if they need to, render a final end of line (called "hard breaks" [§§](#C3)),
but the first thing to keep in mind writing with the Markdown syntax is that you DO NOT NEED
to write your paragraphs chained on a single line. You SHOULD choose a word-wrapping number (a number
of characters a line must not exceed - something like 100 characters in this document) and
pass to next line each time your current one goes to this number.

**Writer Note:** This is generally the case of the common *LICENSE* files: the text of the
license is clearly readable because each line of content does not exceed a short number of
characters.

TODOS

- word about words-wrapping
- paragraphs ?
- meta-data & footnotes ?

### A.3. MDE file format {#A3}

An MDE file MUST be considered as a plain text document. It is basically a raw plain text file just like
a classic `.txt` file. It MAY be encoded in a "classic" file encoding such as `utf-8` or `iso-...`.

Any MDE file MUST work with any software reading file.

**Writer Note:** The best practice is to always use the same extension for MDE files as it permits to identify them
quickly and define some special treatments based on a file extension filtering. The `.md` or `.markdown` 
extensions are given here as examples.

### A.4. Rules ranking {#A4}

The syntax's rules of these specifications are separated in the following three types based on their utility:

**Typography**
:   Rules concerning the rendering of typographic writing usages, such as bold
    text or links ; this almost concerns a word, a group of words or an expression.
    The "typographic" rules are often called "span elements".
    See [§§](#B).

**Structure**
:   Rules concerning a special rendering of a sentence or a group of sentences,
    such as citations or pre-formatted blocks.
    The "structural" rules are often called "block elements".
    See [§§](#C).

**Miscellaneous**
:   Any rule that can not be classified in the two first categories.
    See [§§](#D).


### A.5. Blank lines {#A5}

A "blank line" in MDE is any line that does not output anything ; a line with only spaces 
or tabulations MUST be considered as a blank line.

### A.6. Indentation {#A6}

The indentation level in MDE is *1 tabulation* or *four spaces*:

    1 tab = 4 spaces = 1 indentation level

Any block of content that requires an indentation MAY allow any other syntax's rule to be
used in that content, considering the first character of the first indented line as the new 
left side of its own indentation.

The global rules for blocks sequences are:

-   passing 1 blank line MUST close last indented block (indentation level goes down by 1)
-   passing 2 blank lines MUST close ALL current indented blocks (indentation level goes back to 0)

**Example:** A classic example is the case of a code block following a list item. If only one line is
passed between both, the code block will be considered as part of the list item's content (and must
be indented in consequence by 2: 2 tabulations or 8 spaces). If two blank lines are passed, the block 
must be considered as a fresh new block (the list item is considered finished).

Finally, for rules that requires a character AND an indentation, only the first line MUST 
actually be indented, subsequent lines of the same block can either be indented or not. This
is NOT true when the rule does not include a character (like for pre-formatted blocks - [§§](#C6a)).

**Writer Note:** It is a good idea to always indent a block for readability.


### A.7. Automatic escaping {#A7}

As developed by John Gruber in [original Markdown's manual][markdown-manual], and because the
first goal of Markdown was to build HTML rendering, some special characters considered as 
"meta characters" in HTML MAY be automatically escaped to construct a valid HTML output.
Even if we MUST NOT suppose about the final rendering here ([§§](#scope-of-these-specifications)),
we also posed the condition that any original Markdown rule MUST be valid in MDE ([§§](#A1)).
So we MUST keep the original auto-escaping of HTML meta characters.

Outside a code span or block, the following characters SHOULD be escaped when rendering
an HTML output:

-   the *ampersand* `&` SHOULD be rendered as `&amp;`
-   the *left angle* `<` SHOULD be rendered as `&lt;`

### A.8. Inline HTML {#A8}

On the same idea as for *automatic escaping* ([§§](#A7)), inline HTML MUST be authorized
in an MDE content. **But**, a consequence of the fact that the final rendering MAY NOT be
only HTML ([§§](#scope-of-these-specifications)) is that raw HTML tags MAY NOT be rendered
as writers expect in other formats.

#### A.8.a. Use with caution {#A8a}

In conclusion, raw inline HTML MAY be avoided in an MDE content but parsers MUST be prepared
to treat such contents.

**Implementation Note:** Without being a specification rule, we can conclude that parsers
SHOULD be prepared to handle HTML tags for any final output. For any other format than HTML, 
the best practice MAY be to keep the content "as is" skipping any HTML tag (but keeping the 
text content).

#### A.8.b. HTML comments {#A8b}

HTML comments MUST be an exception as this is the best way to include a comment in an MDE
content. All parsers MUST handle HTML comments as a comment (in any language).

As a reminder, the HTML comment tag is constructed surrounded between `<!--` and `-->` and
can be multi-line:

    <!-- Comment content -->

**Implementation Note:** The final result of a comment is not really defined as it MAY depend
on the rendering format. By default, the best practice SHOULD be to skip comments from final
output as a comment may have been written just for not-visible information. Parsers rendering
an HTML format CAN keep comments "as is" (present in the output) as they won't be displayed.

### A.9. Identifiers {#A9}

An MDE parser MUST be able to reference some specific contents with identifiers (IDs). Each ID
must be unique for the document and SHOULD be constant to let readers retrieve a section with
permanent links. The ID construction process is described in a dedicated section [§§](#D7).

Basically, three types of contents MUST ALWAYS have an ID:

-   the *titles* ([§§](#C5))
-   the *tables* ([§§](#C10))
-   the *figures* ([§§](#C12))

In some cases, the ID CAN be defined by the writer to be sure it will be constructed like he
expects. Please see dedicated section [§§](#D6).


B. Typographic rules {#B}
-------------------------

A rule is considered as *typographic* when it only concerns one or more words written inline
in a text. As long it does not concern a full block of text, a rule MUST be considered as *typographic*.

### B.1. Application scope {#B1}

A typographic rule MUST begin and end in the same block of text. It CAN begin at the beginning of
the block and end at its end, but it MUST NOT concern more than one block.

The example below is valid:

    *A first block of content.*
    
    *Another* one ...

While the notation below is NOT valid:

    *A first block of content.
    
    Another* one ...


### B.2. Emphasis {#B2}

Bold and italic text emphasis MUST keep simple to use and read. The first idea was kept about
these effects allowing two different typeface: the *underscore* `_` and the *asterisk* `*`.

#### B.2.a. Emphasis with underscores {#B2a}

Italic text is written surrounded by one character:

    _italic_

Bold text is written surrounded by two characters:

    __bold__

#### B.2.b. Emphasis with asterisks {#B2b}

Italic text is written surrounded by one character:

    *italic*

Bold text is written surrounded by two characters:

    **bold**

**Writer Note:** For a document often read "as is" as plain text, the asterisk notation MAY be used
as it seems to let the reader understand word's importance.

#### B.2.c. Emphasis auto-escaping {#B2c}

In-words underscores MAY NOT be considered as emphasis delimiters ; for instance, 
writing `my_underscored_words`, the `underscored` word MAY NOT be in italic but the whole
expression MAY be kept "as-is". In other words, writing `__my_underscored_words__` MAY be
rendered as the expression `my_underscored_words` written in bold text (*leading and trailing
characters are considered as emphasis delimiters but internal characters are auto-escaped*).

This rule is important in a case like `underscored_words followed by other_underscores`
as it seems easier to let a parser match the two distant underscores as delimiters while this
MAY NOT be the case (*underscores may be kept "as-is" in both expressions*).

**Implementation Note:** As concluded by Fletcher Penney in his work on MultiMarkdown, the
original reason of this auto-escaping is that "*This caused too many problems with URL's*".
Effectively, URLs often use underscores as a word separator and these ones MUST NOT be considered
as typographic delimiters.


### B.3. Abbreviations {#B3}

An abbreviation is written like a *reference* ([§§](#D3)) with a leading asterisk `*`:

    *[HTML]: Hyper Text Markup Language

The result SHOULD be informing about the full meaning of the term any time this whole term
is found in the content as a whole word.

**Example:** In the example above (the "HTML" term), in an HTML rendering, the result SHOULD
be an `abbr` tag each time the "HTML" string is found in the content as a full word. Thus, 
this MUST NOT concern a string like "HTMLize" as it is not strictly "HTML".


### B.4. Code and variable names {#B4}

Inline code and variables MUST keep simple to use and read. The first idea was kept about
this span: surround the code or variable name between *backticks* `\``. A code span MUST 
allow spaces inside.

    This variable `$var` can be accessed using the `-> get(...)` method


### B.5. Links {#B5}

A *link* concerns any kind of *hypertext link*: a full URL, an in-page link (a hash tag referencing
a section of current document) and any other kind of "clickable" span in an HTML content,
such as an email address, a phone number etc.

**Implementation Note:** A link MUST be rendered clickable for all output formats when it is
possible. When it is not, the address of the link MUST be written in the output to let reader
follow it if he wants.  
For instance, a PDF rendering MUST embed clickable links, but an OpenDocument, which can not
embed clickable interactions, MUST render a link with the original address visible.

#### B.5.a. Automatic links {#B5a}

Standalone URLs MUST NOT be automatically transformed in links if they are not written following one 
of the below rules. An URL written inline in a content with no specific "link" tag is not a link, it
is just a raw URL (in an HTML content, it MAY NOT be clickable).

#### B.5.b. Raw inline links {#B5b}

Making an URL (or any kind of text) clickable can be done by surrounding it between angle brackets `<` and `>`:

    <http://link.com/query>

Any text written like that MUST be rendered clickable (with a special treatment if required,
such as email addresses links - see [§§](#B5e)).

#### B.5.c. Inline links {#B5c}

Links can be written *inline* in the text, separated in two parts:

-   the link text between brackets `[` and `]`
-   then, between parenthesis `(` and `)`, the URL of the link (relative or absolute) and 
    an OPTIONAL title wrapped in double-quotes `"` followed by an OPTIONAL list of attributes ([§§](#D6)).


    [a simple link](http://test.com/)

    [a link with a title](http://test.com/ "My optional title")

    [a link with a title and some attributes](http://test.com/ "My optional title" attribute1=value attribute2=value)

#### B.5.d. In-page links {#B5d}

In-page anchors can be accessed using the notation of inline links ([§§](#B5b)) replacing the URL by the section hash:

    [my section](#section-id)

See the dedicated section ([§§](#D7)) to learn how to define the hash reference of a part.

#### B.5.e. Special links {#B5e}

Some special treatments MAY be applied to special links such as email addresses. As these kinds
of links can evolve, there is no list of them here.

**Implementation Note:** For instance, in an HTML rendering, an email address should be transformed 
as a `mailto:...` link.

#### B.5.f. Referenced links {#B5f}

Links MUST allow the *references* ([§§](#D3)) notation:

    This is a paragraph with a [referenced link][linkid] ...
    
    [linkid]: http://test.com/ "My optional title"

This notation can be simplified if the "ID" is the exact same string as the link text:

    This is a paragraph with a link to [Test.com][] ...
    
    [Test.com]: http://test.com/ "My optional title"

### B.6. Images {#B6}

Basically, images follow the same notation as for *links* ([§§](#B5)) with a leading exclamation point.

#### B.6.a. Inline images {#B6a}

Images can be written *inline* in the text, separated in two parts:

-   the image alternated text between brackets `[` and `]` preceded by an exclamation point `!`
-   then, between parenthesis `(` and `)`, the URL of the image (relative or absolute) and an 
    OPTIONAL title wrapped in double-quotes `"` followed by an OPTIONAL list of attributes ([§§](#D6)).


    ![alt text](http://test.com/data1/images/1.jpg)

    ![alt text](http://test.com/data1/images/1.jpg "My optional title")

    ![alt text](http://test.com/data1/images/1.jpg "My optional title" class=myimageclass style="width: 40px;")

#### B.6.b. Referenced images {#B6b}

Images MUST allow the *references* ([§§](#D3)) notation:

    This is a paragraph with an embedded image ![referenced image][imageid] ...
    
    ![imageid]: http://test.com/data1/images/1.jpg "My optional title"

Just like for *links* ([§§](#B5f)), the image reference notation can be simplified if the
"ID" is the exact same string as the "alternate" text:

    This is a paragraph with an embedded image ![image 1][] ...
    
    ![image 1]: http://test.com/data1/images/1.jpg "My optional title"


### B.7. Footnotes {#B7}

Footnotes may be considered as a "special case" as we MAY allow writers to distinguish
simple footnotes from glossary and citations notes. The construction rules of these three
types MUST follow the same idea, with a special construction for glossary and citation
notes, which can be considered as special footnotes. Please refer to the dedicated 
section about notes [§§](#D5).

### B.8. Inline mathematics {#B8}

Inline mathematics is written by surrounding the content between escaped parenthesis `\(` and `\)`:

    \(...\)
    \(\alpha = (t_1 - t_0)/L\)

Mathematics notation is developed in a dedicated section [§§](#D4).


C. Structural rules {#C}
------------------------

A rule is considered as *structural* when it concerns a whole block of content.


### C.1. Application scope {#C1}

A "block" of content is separated from others by:

-   the top or bottom sides of the document
-   a blank line

Any block of content MUST allow any other syntax's rule to be used and interpreted. This can
create some nested indentations as described at [§§](#A6).

### C.2. Paragraphs {#C2}

To build a paragraph, just surround it between blank lines (at least one before and one after).

    Paragraph 1 ...
    
    Paragraph 2 ...

### C.3. Line breaks {#C3}

To insert a line break, write two or more spaces at the end of the line and pass to next line.

    Line 1 ...  
    Line 2 ...

### C.4. Horizontal rules {#C4}

To insert an horizontal rule, write at least three hyphens `-`, asterisks `*` or underscores `_` 
alone on a line (spaces MUST not care):

    ***
    ----
    _ _ _

### C.5. Titles {#C5}

Titles are built using two notations: the "atx" and the "sextet". HTML tags have a limit
of 6 levels (`h1` to `h6`) but a MDE parser MUST ignore this limit and be prepared for any
depth levels as writer requires in a document.

The titles list of a document MAY be accessible to build a "table of contents" quickly.
This is developed at [§§](#D8a).

#### C.5.a. ATX: sharps titles {#C5a}

An "ATX" title is written alone on a single line, preceded by as many sharps `#` as the title level:

    # Title level 1 (HTML tag `h1`)

    ### Title level 3 (HTML tag `h3`)

OPTIONALLY, ATX titles can be "closed" using a random number of sharps at the end of the text:

    ### Title level 3 (HTML tag `h3`) ##

**Implementation Note:** The "ATX" structure is taken from [the ATX markup][atx-markup].

#### C.5.b. Setext: underlined titles {#C5b}

The "dash" notation only concerns the two first levels of titles in a document. They are written
underlined by equal signs `=` for the first level and hyphens `-` for the second:

    Title level 1 (HTML tag `h1`)
    =============================

    Title level 2 (HTML tag `h2`)
    -----------------------------

The underlining line MUST NOT require to be as long as the title text, any number of
equals or dashes MUST work.

**Writer Note:** If you know that a document will often be read "as-is" as plain text, the Setext notation
MAY be chosen preferably to the ATX one as it seems more comprehensive.

**Implementation Note:** The "sextet" structure is taken from [the Setext markup][setext-markup].

### C.6. Pre-formatted texts {#C6}

#### C.6.a. Simple notation {#C6a}

A pre-formatted block is written as a paragraph beginning lines with 4 spaces (*the pipe 
of the example below is not included in the notation and represents line's 1st character*):

    |    a pre formed content

Following to indentation rules for blocks ([§§](#A6)), ALL lines of a pre-formatted block 
MUST be indented as this is the only rule to identify that kind of content.

#### C.6.b. Fenced code blocks {#C6b}

A "fenced" code block can be written surrounded a content between two lines of tildes `~` 
or backticks `\`` (at least 3):

    ~~~
    My code here
    ~~~

**Implementation Note:** The rendering of such content MUST be the exact same as for "classic"
pre-formatted content ([§§](#C6)).

An information about the language used in the block can be defined following the first delimiter by the 
language name (without space):

    ```html
    My HTML code here
    ```

**Implementation Note:** In an HTML implementation, this feature permits to create a *language friendly* code block, 
as recommended by the W3C in the [HTML5 specifications][w3c-html5-code-specifications].


### C.7. Citations {#C7}

A blockquoted block is written preceding each line or only the first one of a paragraph by a right angle bracket `>`:

    > This is my blockquote,
    > where we can include **other Markdown** tags ...

    > We can also write our blockquotes
    without the superior sign on each line, but just at the beginning of the first one.

Once a blockquote has begin (*e.g. as long as no blank line is passed*), the content will be part of it.

To precise the URL of the original content cited, write this URL at the beginning of the first line
between parenthesis `(` and `)`:

    > (http://test.com/) This is my blockquote,
    > with a content cited from the original "http://test.com" page ...

Nested blockquotes can be written with consecutive left angle signs rather than indenting
each one:

    > This is my blockquote
    > > This is a nested blockquote

MUST be the same as:

    > This is my blockquote
    >> This is a nested blockquote

**Writer Note:** The notation of blockquotes is the "classic" *email-style* for citations, this
is the reason why the indentation between the angle bracket and the content is NOT required.


### C.8. Lists {#C8}

#### C.8.a. Unordered lists {#C8a}

An un-ordered list is written beginning each entry by an asterisk `*`, a plus sign `+` or an 
hyphen `-` followed by 1 or more space(s). The character used for each item of a list MUST NOT matter:

    -   first item
    *   second item
    -   third item

To create sub-items, just indent the sub-list twice:

    -   first item
    *   second item
        - first sub-item
        * second sub-item
    -   third item

#### C.8.b. Ordered lists {#C8b}

An ordered list is written beginning each entry by a number followed by a period `.` and 
1 or more space(s). The number used for each item of a list MUST NOT matter:

    1.   first item
    1.   second item
        1.  first sub-item
        1.  second sub-item
    2.   third item

**Writer Note:** A special attention MAY be attached when beginning a line with a raw dash, asterisk or plus or
with a number followed by a point. For instance, to write the raw string `123. My text`, the
point after the number MUST be escaped to not be parsed as an ordered list item:

    123\. My text


### C.9. Terms definitions {#C9}

A definition is written separated in at least two parts:

- the term on the first line, with no leading space or character
- then, the definition beginning on the second line, with a leading colon `:`


    Apple
    :   Pomaceous fruit of plants of the genus Malus in
        the family Rosaceae.

A term can have multiple definitions, separated by a blank line:

    Apple
    :   Pomaceous fruit of plants of the genus Malus in
        the family Rosaceae.

    :   Lorem ipsum.

Each definition can have multiple paragraphs:

    Apple
    :   Pomaceous fruit of plants of the genus Malus in
        the family Rosaceae.

        Lorem ipsum.


### C.10. Tables {#C10}

#### C.10.a. Basic table {#C10a}

The basic table syntax is as simple as trying to build a visual table in plain text:

    | First Header  | Second Header    |
    | ------------- | ---------------- |
    | Content Cell  | Content *Cell*   |
    | Content Cell  | Content **Cell** |

The rules here are:

-   every table's line is written alone on a single line
-   the first lines are the headers of the table (most of the time one single line)
-   it is followed by a mandatory separator line of hyphens `-`
-   each line below is a line of the table content
-   columns are separated by pipes `|` and each line may have the same number of pipes
-   spacing is not important except for visual facility
-   tables can be written without the leading pipes

Finally, the content of the cells can have other MDE's typographic features like emphasis.

#### C.10.b. Columns alignment {#C10b}

Alignment in columns can be specified by using colons `:` in the separators line:

-   a colon on the left of a separator's cell means a left-aligned column : `:---`
-   a colon on the right of a separator's cell means a right-aligned column : `---:`
-   two colons on the left and the right of a separator's cell means a centered column : `:--:`


    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  | **Cell**      | **Cell**     |
    | Content Cell  | **Cell**      | **Cell**     |

#### C.10.c. Cell grouping {#C10c}

To build cell groups (one cell over more than one column) we write as many final pipes as the content 
must cover columns, without spaces:

    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |

**Implementation Note:** Cell grouping MUST be allowed in lines of content AND header line(s).

#### C.10.d. Table ID {#C10d}

Table ID is written between brackets `[` and `]` just before or just after the table, 
on a new single line:

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    [table-id]

This ID MUST be used to build the *table of figures and tables* ([§§](#D8b)).

#### C.10.e. Table caption {#C10e}

Table caption is written between brackets `[` and `]` just after the table ID ([§§](#C10d)):

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    [table-id][ my table caption ]

If only one information is found between brackets around a table, it MUST be considered as
its ID ([§§](#C10d)).

#### C.10.f. Table with multiple bodies {#C10f}

Separate sets of content for a single table are written separating them with one blank line:

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    
    | New section   |   More        |         Data |
    | And more      |           And more          ||

**Implementation Note:** In HTML, the result should be a table with two `tbody` sections.

### C.11. Mathematics blocks {#C11}

Block of mathematics formula is written surrounding the content between escaped brackets `\[` and `\]`
(additionally to blank lines):

    \[...\]
    \[\Delta = \frac{\partial U^*}{\partial F} = \frac{12F}{Eb} \int_0^L \frac{x^2}{(t_0 + \alpha x)^3} dx\]

Mathematics notation is developed in a dedicated section [§§](#D4).

### C.12. Images blocks {#C12}

Following the same notation as for *inline images* ([§§](#B6a)), an image CAN be written
as a single block alone on a line:

    A paragraph ...

    ![alt text](http://test.com/data1/images/1.jpg "My optional title" class=myimageclass style="width: 40px;")

    Another paragraph ...

This notation MUST be used to build the *table of figures and tables* ([§§](#D8b)).

**Implementation Note:** In an HTML rendering, a block image MAY be rendered as a `figure`
tag, as recommended by the W3C in the [HTML5 specifications][w3c-html5-code-specifications].


D. Miscellaneous rules {#D}
---------------------------

### D.1. Meta data {#D1}

Meta-data can be added to an MDE document when necessary ; it can be the case to specify
a special title for the document, its author or any kind of "meta" information.

A meta-data is added writing it at the very top of the document (without any blank line from
the top) as a `var: val` pair:

    author: John Doe

A meta-data name MUST be a kind of "slug": a single string without space which can be considered
as an ID.

Multiple meta-data can be written, beginning each item on a new line, and the "true" content
of the document MUST begin after passing at least one blank line after meta-data.

The value of the meta-data MUST allow multi-lines content.

Meta-data can also be used to define variables values available in the document. To use a
meta-data value, use notation `[%var]`: the meta-data name preceded by a percent sign `%` 
between brackets `[` and `]`.

    mymeta: A value for the meta-data

    This is the document content, where I can call [%mymeta] value.


### D.2. Escaping of meta-characters {#D2}

Escaping a meta-character in MDE only consists in preceding it by a "back-slash" `\`.

The following characters MUST be escaped to be rendered as the raw character they are:

-   `\\` : the backslash itself
-   `\.` : the dot
-   `\:` : the colon
-   `\!` : the exclamation point
-   `\#` : the hash mark
-   `\*` : the asterisk
-   `\+` : the plus sign
-   `\-` : the hyphen
-   `\_` : the underscore
-   `\`` : the backtick quote
-   `\|` : the pipe
-   `\(\)` : the parentheses
-   `\[\]` : the brackets
-   `\{\}` : the curly brackets


### D.3. References {#D3}

The idea of the "references" comes from the first idea of Markdown: let the content readable "as is".

So, in some cases, it is most relevant to move an information on a single line anywhere in the
document (at its bottom for instance) and only insert its ID at its final place.

### D.3.a. Basis of references {#D3a}

The global construction of references is to replace the content by an ID and write that
content on another line anywhere:

    This is a paragraph with a [referenced link][linkid] ...
    
    ...

    [linkid]: http://test.com/ "My optional title"

In the case above, the final rendering MUST be exactly the same as if it was written like:

    This is a paragraph with a [referenced link](http://test.com/ "My optional title") ...
    
    ...

### D.3.b. Various types of references {#D3b}

As developed in other sections of these specifications, the "reference" notation is used for
different MDE's rules, following different constructions:

1.  the classic reference as described in [D.3.a.](#D3a), which can be used for links and images:

        [id]: http://test.com/ "Optional title"

2.  the abbreviation reference as described in [B.3.](#B3):

        *[TERM]: Content of the abbreviated acronym.

3.  the footnote reference as described in [D.5.a.](#D5a):

        [^id]: Content of the footnote.

4.  the glossary note reference as described in [D.5.b.](#D5b):

        [^myid]: glossary: Term
        Actual content of the glossary footnote.

5.  the citation note reference as described in [D.5.c.](#D5c):

        [#Doe:1991]: FirstName LastName (October 5, 1991). *Title of the work*.

### D.4. Mathematics {#D4}

One of the goal of MDE (and globally the Markdown syntax) is to write documentation. In this
idea, MDE parsers MUST be prepared to handle complex mathematical notations.

Inline ([§§](#B8)) and block ([§§](#C11)) mathematical contents (the part inside both wrappers) 
MUST follow the [LaTeX syntax][latex-maths-doc].

**Implementation Note:** The final rendering of the mathematical notations can be the scope of 
a third-party application but an MDE parser MUST integrate such third-party natively.


### D.5. The special case of notes {#D5}

Footnotes in a text are a way to increase its meaning, external references, some required
definitions for the global comprehension, without overcrowding it. They are often used in
books and official contents.

We can distinguish three types of footnotes in a content, depending on their intention:

-   **a simple footnote** is a short additional content that would have no place in the content,
-   **a glossary note** is an explanation about a technical term or a glossary entry,
-   **a bibliographic note**, which refers to another book or work, is a hard reference to let the
    reader find the original source.

#### D.5.a. Footnotes {#D5a}

To create a *footnote* reference, just write its ID like `[^ID]`: a circumflex `^` before the ID string,
between brackets `[` and `]` in the content, then write the footnote content as a *reference* ([§§](#D3)):

    Paragraph with a footnote[^myid].

    ...

    [^myid]: Content of the footnote.

A footnote can also be written inline like:

    Paragraph with a footnote[^Content of the footnote.].

#### D.5.b. Glossary notes {#D5b}

A glossary note is most like a definition. It is attached to a specific term and tries to give
one or more explanation(s) of it. Glossary notes have to be considered as *definitions list*,
except that they will all be placed like footnotes (at the end of the content for instance).

A *glossary footnote* is written like a classic *footnote* but the first line of the note content
contains concerned term, preceded by the string `glossary: `:

    Paragraph with a glossary note[^myid].

    ...

    [^myid]: glossary: Term
    Actual content of the glossary footnote.

On the first line of the note, the term defined can OPTIONALLY be followed by a *short key*
which will be used to build the sorting order of the glossary.

#### D.5.c. Citation notes {#D5c}

A bibliographic note is a fully referenced external work. This kind of notes is often used
in academic or scientific work. The point is that we have to follow some *academic rules* 
for bibliographic notes, basically to cite enough information to let the reader find this
work easily.

A *citation note* is written like a classic footnote but:

-   the ID of the note is constructed in two parts like `[p. XX][#Doe:1991]`:
    -   the page number between brackets `[` and `]` (this part is OPTIONAL)
    -   the reference ID, preceded by a sharp `#`
-   the note content follows the same rules as for classic footnotes, but the circumflex
    is replaced by a sharp `#`.


    Paragraph with a citation note[p. XX][#Doe:1991].

    ...

    [#Doe:1991]: FirstName LastName (October 5, 1991). *Title of the work*.
    edition for instance ... (Web link) Retrieved September 30, 2011.

**Implementation Note:** Parsers MAY have to follow some typographic *academic rules* for bibliographic 
notes, such as naming the authors in bold, writing the title of the work in italic etc.


### D.6. User defined attributes {#D6}

#### D.6.a. Tags attributes {#D6a}

A special notation allows writers to define some specific attributes, taken from the HTML 
markup language: some **class names** and some **identifiers**.

Writers can use the following notation, placing it near concerned content:

    {#id}
    {.class-name}
    {.class-name #id}

This notation can be decomposed in:

-   one or zero ID string preceded by a hash mark `#`
-   zero, one or more class names preceded by a period `.`
-   each attribute separated from others by a space ` `
-   the whole string surrounded between curly brackets `{` and `}`

Such notation concerns the following contents:

-   the *titles* ([§§](#C5)):

        ### My title content {#title-id}

-   the *links* ([§§](#B5)):

        [link text](http://test.com/){#link-id}

-   the *images* ([§§](#B6) and [§§](#C12)):

        ![alt text](http://test.com/img.ext){#image-id}

-   the *fenced code blocks* ([§§](#C6b)):

        ~~~{.class-name}
        code block content
        ~~~

-   the *references* ([§§](#D3)):

        A paragraph with referenced [link][link-id] and ![image][image-id].
        
        [link-id]: http://test.com/ {#link-id}
        ![image-id]: http://test.com/img.ext {#image-id}


As developed in the *identifiers construction* section ([§§](#D7)), any ID defined in the
content MUST be used instead of automatic one (with, eventually, modifications to fit the
"slug" specifications).

**Implementation Note:** In an HTML rendering, the output MUST be a tag with user defined
class names as `class` attribute and ID as `id` attribute. In other output formats, some
class names SHOULD have an effect in the final rendering (by defining a special rendering
for common class names for instance).

#### D.6.b. Raw attributes {#D6b}

In some notations, writers can add raw attributes to contents. This basically concerns only
*links* ([§§](#B5)) and *images* ([§§](#B6) and [§§](#C12)).

The global rule for such a notation is that:

-   when the attribute value is unique, the simple notation `var=val` is allowed
-   when the attribute value is "long" (includes multiple words), the notation MUST
    use double-quoted values `"` : `var="val1 val2"`


### D.7. Identifiers construction {#D7}

For the construction of the IDs described at [§§](#A9), an MDE parser MUST use a constant 
"*slugification*" process. Trying to build these specifications, we found three third-parties
definitions useful:

-   the [Django "slug" field][django-slug] specification:

    > (https://docs.djangoproject.com/en/dev/glossary/#term-slug)
    A short label for something, containing only letters, numbers, underscores or hyphens.

-   the [HTML4 "id" attribute][html4-id] specification:

    > (http://www.w3.org/TR/html4/types.html#type-id)
    ID [...] tokens must begin with a letter ([A-Za-z]) and may be followed by any number 
    of letters, digits ([0-9]), hyphens ("-"), underscores ("_"), colons (":"), and periods (".").

-   the [W3C "id" attribute][w3c-id] definition:

    > (http://www.w3schools.com/tags/att_global_id.asp)
    [...] In HTML, all values are case-insensitive.

In conclusion, in MDE, the construction of IDs MUST follow the rules below:

-   a string all lower-case
-   containing letters `[A-Za-z]`, digits `[0-9]`, hyphens `-`, underscores `_`, colons `:` and periods `.`

These rules MUST be applied when constructing an automatic ID AND when a user defined ID occurred
[§§](#D6). When a writer specify an ID "by hand", parser MUST take that ID instead of creating an
automatic one, but this ID MUST be transformed to follow above specifications if it is not the case.

**Example:** The example below is given as a demonstration. The final "slugify" process is NOT part
of these specifications:

    ### This is a title
    // => id=this-is-a-title


### D.8. Automatic indexes {#D8}

### D.8.a. Table of contents {#D8a}

Any MDE parser MUST handle a table of contents, extracting at least all titles of a document.
Global document's structure MUST be able to use both titles notations ([§§](#C5)) to build a 
single table of contents.

To do so, any title MUST have a unique ID as reference (like the `id` attribute of an HTML tag)
and this ID MUST follow the specifications at [§§](#D7).


### D.8.b. Table of figures and tables {#D8b}

Any MDE parser MUST handle a table of figures and tables of the document, extracting the
following objects:

-   any *table* ([§§](#C10))
-   any *figure* ([§§](#C12))

To do so, any table and figure MUST have a unique ID as reference (like the `id` attribute of an HTML tag)
and this ID MUST follow the specifications at [§§](#D6).


### D.9. Implementers specifics {#D9}

This section will describe some features and rules the MDE's parsers MUST implement (except
where noted).

#### D.9.a. Error handling {#D9a}

MDE parsers MUST be prepared to handle syntax errors informing the writer about what caused
the error and, OPTIONALLY, how to fix it. The error information MAY be a simple phrase with
a line number or the tag's type that causes the error.

#### D.9.b. Structural tags {#D9b}

A parser SHOULD let the writer choose its rendering structure by allowing him to use *structural
tags* that SHOULD be replaced by corresponding block (mostly indexes) if it is defined and
not empty.

These tags are:

-   `TOC` for the *table of contents* ([§§](#D8a))
-   `TOF` for the *table of figures* ([§§](#D8b))
-   `NOTES` for the *footnotes* ([§§](#D5)), which SHOULD be separated in three other tags:
    -   `FOOTNOTES` for "classic" *footnotes* ([§§](#D5a))
    -   `GLOSSARY` for glossary *footnotes* ([§§](#D5b))
    -   `CITATIONS` for citations *footnotes* ([§§](#D5c))

The construction of such tag MAY follow these rules:

-   the name of the tag (from the list above) in capital letters
-   surrounded between percent sign `%` and curly brackets `{` and `}`
-   OPTIONAL spaces surrounding the tag name.


    \{% TOC %\}
    \{% TOF %\}
    \{% NOTES %\}
    \{% FOOTNOTES %\}
    \{% GLOSSARY %\}
    \{%CITATIONS%\}

#### D.9.c. User configuration {#D9c}

An MDE's parser SHOULD propose any user to define some preferences with a table of options.

#### D.9.d. Various {#D9d}

##### D.9.d.1. Other file inclusion {#D9d1}
##### D.9.d.2. Critic markup {#D9d2}


Contribute
----------

This document and the MDE's specification are opened for any kind of discussion, argumentation, 
translation and any other modification.

If you'd like to leave feedback, please [open an appropriate issue on GitHub][package-issues].
You could first search in existing tickets if your comment does not already exists. If your
ticket concerns a specific rule, please include its reference in its title like `X.Y.Z. Ticket title ...`.

The source of this document is maintained under a GIT version-control repository publicly hosted on [GitHub][github].
If you want to participate in any way, just [fork and edit][github-fork-doc] the original repository 
and ask for a [pull request][github-pull-doc] opening the appropriate issue ticket. GitHub embeds 
many tools and procedures to allow a quick and simple "*fork/pull request*" process.

If you want to contribute by translating this document, follow the steps above and create a 
copy of the original `mde-manifest.md` file named like `mde-manifest.LN.md` where `LN` is
your language code following the [ISO 639-1 list][iso-639-1].

And finally, THANK YOU for being involved ;)


*[MDE]: MarkDown Extended
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
[setext-markup]: http://docutils.sourceforge.net/mirror/setext.html
[atx-markup]: http://www.aaronsw.com/2002/atx/
[django-slug]: https://docs.djangoproject.com/en/dev/ref/models/fields/#slugfield
[html4-id]: http://www.w3.org/TR/html4/types.html#type-id
[w3c-id]: http://www.w3schools.com/tags/att_global_id.asp
[markdown-mark]: http://dcurt.is/the-markdown-mark
