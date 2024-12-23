class DynamicSelect {
    constructor(e, t = {}) {
        (this.options = Object.assign(
            {
                placeholder: "Select an option",
                columns: 1,
                name: "",
                width: "",
                height: "",
                data: [],
                onChange: function () { },
            },
            t
        )),
            (this.selectElement =
                "string" == typeof e ? document.querySelector(e) : e);
        for (const s in this.selectElement.dataset)
            void 0 !== this.options[s] &&
                (this.options[s] = this.selectElement.dataset[s]);
        if (
            ((this.name = this.selectElement.getAttribute("name")
                ? this.selectElement.getAttribute("name")
                : "dynamic-select-" + Math.floor(1e6 * Math.random())),
                !this.options.data.length)
        ) {
            var i = this.selectElement.querySelectorAll("option");
            for (let e = 0; e < i.length; e++)
                this.options.data.push({
                    value: i[e].value,
                    text: i[e].innerHTML,
                    img: i[e].getAttribute("data-img"),
                    selected: i[e].selected,
                    html: i[e].getAttribute("data-html"),
                    imgWidth: i[e].getAttribute("data-img-width"),
                    imgHeight: i[e].getAttribute("data-img-height"),
                });
        }
        (this.element = this._template()),
            this.selectElement.replaceWith(this.element),
            this._updateSelected(),
            this._eventHandlers();
    }
    _template() {
        let i = "";
        for (let t = 0; t < this.data.length; t++) {
            var s = 100 / this.columns;
            let e = "";
            (e =
                this.data[t].html ||
                `
                    ${this.data[t].img
                    ? `<img src="${this.data[t].img}" alt="${this.data[t].text
                    }" class="${this.data[t].imgWidth &&
                        this.data[t].imgHeight
                        ? "dynamic-size"
                        : ""
                    }" style="${this.data[t].imgWidth
                        ? "width:" + this.data[t].imgWidth + ";"
                        : ""
                    }${this.data[t].imgHeight
                        ? "height:" + this.data[t].imgHeight + ";"
                        : ""
                    }">`
                    : ""
                }
                    ${this.data[t].text
                    ? '<span class="dynamic-select-option-text">' +
                    this.data[t].text +
                    "</span>"
                    : ""
                }
                `),
                (i += `
                <div class="dynamic-select-option${this.data[t].value == this.selectedValue
                        ? " dynamic-select-selected"
                        : ""
                    }${this.data[t].text || this.data[t].html
                        ? ""
                        : " dynamic-select-no-text"
                    }" data-value="${this.data[t].value}" style="width:${s}%;${this.height ? "height:" + this.height + ";" : ""
                    }">
                    ${e}
                </div>
            `);
        }
        var e = `
            <div class="dynamic-select ${this.name}"${this.selectElement.id
                ? ' id="' + this.selectElement.id + '"'
                : ""
            } style="${this.width ? "width:" + this.width + ";" : ""}${this.height ? "height:" + this.height + ";" : ""
            }">
                <input type="hidden" name="${this.name}" value="${this.selectedValue
            }">
                <div class="dynamic-select-header" style="${this.width ? "width:" + this.width + ";" : ""
            }${this.height ? "height:" + this.height + ";" : ""
            }"><span class="dynamic-select-header-placeholder">${this.placeholder
            }</span></div>
                <div class="dynamic-select-options" style="${this.options.dropdownWidth
                ? "width:" + this.options.dropdownWidth + ";"
                : ""
            }${this.options.dropdownHeight
                ? "height:" + this.options.dropdownHeight + ";"
                : ""
            }">${i}</div>
            </div>
        `,
            t = document.createElement("div");
        return (t.innerHTML = e), t;
    }
    _eventHandlers() {
        this.element.querySelectorAll(".dynamic-select-option").forEach((t) => {
            t.onclick = () => {
                this.element
                    .querySelectorAll(".dynamic-select-selected")
                    .forEach((e) =>
                        e.classList.remove("dynamic-select-selected")
                    ),
                    t.classList.add("dynamic-select-selected"),
                    (this.element.querySelector(
                        ".dynamic-select-header"
                    ).innerHTML = t.innerHTML),
                    (this.element.querySelector("input").value =
                        t.getAttribute("data-value")),
                    this.data.forEach((e) => (e.selected = !1)),
                    (this.data.filter(
                        (e) => e.value == t.getAttribute("data-value")
                    )[0].selected = !0),
                    this.element
                        .querySelector(".dynamic-select-header")
                        .classList.remove("dynamic-select-header-active"),
                    this.options.onChange(
                        t.getAttribute("data-value"),
                        t.querySelector(".dynamic-select-option-text")
                            ? t.querySelector(".dynamic-select-option-text")
                                .innerHTML
                            : "",
                        t
                    );
            };
        }),
            (this.element.querySelector(".dynamic-select-header").onclick =
                () => {
                    this.element
                        .querySelector(".dynamic-select-header")
                        .classList.toggle("dynamic-select-header-active");
                }),
            this.selectElement.id &&
            document.querySelector(
                'label[for="' + this.selectElement.id + '"]'
            ) &&
            (document.querySelector(
                'label[for="' + this.selectElement.id + '"]'
            ).onclick = () => {
                this.element
                    .querySelector(".dynamic-select-header")
                    .classList.toggle("dynamic-select-header-active");
            }),
            document.addEventListener("click", (e) => {
                e.target.closest("." + this.name) ||
                    e.target.closest(
                        'label[for="' + this.selectElement.id + '"]'
                    ) ||
                    this.element
                        .querySelector(".dynamic-select-header")
                        .classList.remove("dynamic-select-header-active");
            });
    }
    _updateSelected() {
        this.selectedValue &&
            (this.element.querySelector(".dynamic-select-header").innerHTML =
                this.element.querySelector(
                    ".dynamic-select-selected"
                ).innerHTML);
    }
    get selectedValue() {
        var e = this.data.filter((e) => e.selected);
        return e.length ? e[0].value : "";
    }
    set data(e) {
        this.options.data = e;
    }
    get data() {
        return this.options.data;
    }
    set selectElement(e) {
        this.options.selectElement = e;
    }
    get selectElement() {
        return this.options.selectElement;
    }
    set element(e) {
        this.options.element = e;
    }
    get element() {
        return this.options.element;
    }
    set placeholder(e) {
        this.options.placeholder = e;
    }
    get placeholder() {
        return this.options.placeholder;
    }
    set columns(e) {
        this.options.columns = e;
    }
    get columns() {
        return this.options.columns;
    }
    set name(e) {
        this.options.name = e;
    }
    get name() {
        return this.options.name;
    }
    set width(e) {
        this.options.width = e;
    }
    get width() {
        return this.options.width;
    }
    set height(e) {
        this.options.height = e;
    }
    get height() {
        return this.options.height;
    }
}
document
    .querySelectorAll("[data-dynamic-select]")
    .forEach((e) => new DynamicSelect(e));
