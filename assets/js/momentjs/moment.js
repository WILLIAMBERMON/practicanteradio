/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//! moment.js
//! version : 2.8.4
//! authors : Tim Wood, Iskren Chernev, Moment.js contributors
//! license : MIT
//! momentjs.com
(function (a) {
    function b(a, b, c) {
        switch (arguments.length) {
            case 2:
                return null != a ? a : b;
            case 3:
                return null != a ? a : null != b ? b : c;
            default:
                throw new Error("Implement me")
            }
    }

    function c(a, b) {
        return zb.call(a, b)
    }
    function d() {
        return{empty: !1, unusedTokens: [], unusedInput: [], overflow: -2, charsLeftOver: 0, nullInput: !1, invalidMonth: null, invalidFormat: !1, userInvalidated: !1, iso: !1}
    }
    function e(a) {
        tb.suppressDeprecationWarnings === !1 && "undefined" != typeof console && console.warn && console.warn("Deprecation warning: " + a)
    }
    function f(a, b) {
        var c = !0;
        return m(function () {
            return c && (e(a), c = !1), b.apply(this, arguments)
        }, b)
    }
    function g(a, b) {
        qc[a] || (e(b), qc[a] = !0)
    }
    function h(a, b) {
        return function (c) {
            return p(a.call(this, c), b)
        }
    }
    function i(a, b) {
        return function (c) {
            return this.localeData().ordinal(a.call(this, c), b)
        }
    }
    function j() {
    }
    function k(a, b) {
        b !== !1 && F(a), n(this, a), this._d = new Date(+a._d)
    }
    function l(a) {
        var b = y(a), c = b.year || 0, d = b.quarter || 0, e = b.month || 0, f = b.week || 0, g = b.day || 0, h = b.hour || 0, i = b.minute || 0, j = b.second || 0, k = b.millisecond || 0;
        this._milliseconds = +k + 1e3 * j + 6e4 * i + 36e5 * h, this._days = +g + 7 * f, this._months = +e + 3 * d + 12 * c, this._data = {}, this._locale = tb.localeData(), this._bubble()
    }
    function m(a, b) {
        for (var d in b)
            c(b, d) && (a[d] = b[d]);
        return c(b, "toString") && (a.toString = b.toString), c(b, "valueOf") && (a.valueOf = b.valueOf), a
    }
    function n(a, b) {
        var c, d, e;
        if ("undefined" != typeof b._isAMomentObject && (a._isAMomentObject = b._isAMomentObject), "undefined" != typeof b._i && (a._i = b._i), "undefined" != typeof b._f && (a._f = b._f), "undefined" != typeof b._l && (a._l = b._l), "undefined" != typeof b._strict && (a._strict = b._strict), "undefined" != typeof b._tzm && (a._tzm = b._tzm), "undefined" != typeof b._isUTC && (a._isUTC = b._isUTC), "undefined" != typeof b._offset && (a._offset = b._offset), "undefined" != typeof b._pf && (a._pf = b._pf), "undefined" != typeof b._locale && (a._locale = b._locale), Ib.length > 0)
            for (c in Ib)
                d = Ib[c], e = b[d], "undefined" != typeof e && (a[d] = e);
        return a
    }
    function o(a) {
        return 0 > a ? Math.ceil(a) : Math.floor(a)
    }
    function p(a, b, c) {
        for (var d = "" + Math.abs(a), e = a >= 0; d.length < b; )
            d = "0" + d;
        return(e ? c ? "+" : "" : "-") + d
    }
    function q(a, b) {
        var c = {milliseconds: 0, months: 0};
        return c.months = b.month() - a.month() + 12 * (b.year() - a.year()), a.clone().add(c.months, "M").isAfter(b) && --c.months, c.milliseconds = +b - +a.clone().add(c.months, "M"), c
    }
    function r(a, b) {
        var c;
        return b = K(b, a), a.isBefore(b) ? c = q(a, b) : (c = q(b, a), c.milliseconds = -c.milliseconds, c.months = -c.months), c
    }
    function s(a, b) {
        return function (c, d) {
            var e, f;
            return null === d || isNaN(+d) || (g(b, "moment()." + b + "(period, number) is deprecated. Please use moment()." + b + "(number, period)."), f = c, c = d, d = f), c = "string" == typeof c ? +c : c, e = tb.duration(c, d), t(this, e, a), this
        }
    }
    function t(a, b, c, d) {
        var e = b._milliseconds, f = b._days, g = b._months;
        d = null == d ? !0 : d, e && a._d.setTime(+a._d + e * c), f && nb(a, "Date", mb(a, "Date") + f * c), g && lb(a, mb(a, "Month") + g * c), d && tb.updateOffset(a, f || g)
    }
    function u(a) {
        return"[object Array]" === Object.prototype.toString.call(a)
    }
    function v(a) {
        return"[object Date]" === Object.prototype.toString.call(a) || a instanceof Date
    }
    function w(a, b, c) {
        var d, e = Math.min(a.length, b.length), f = Math.abs(a.length - b.length), g = 0;
        for (d = 0; e > d; d++)
            (c && a[d] !== b[d] || !c && A(a[d]) !== A(b[d])) && g++;
        return g + f
    }
    function x(a) {
        if (a) {
            var b = a.toLowerCase().replace(/(.)s$/, "$1");
            a = jc[a] || kc[b] || b
        }
        return a
    }
    function y(a) {
        var b, d, e = {};
        for (d in a)
            c(a, d) && (b = x(d), b && (e[b] = a[d]));
        return e
    }
    function z(b) {
        var c, d;
        if (0 === b.indexOf("week"))
            c = 7, d = "day";
        else {
            if (0 !== b.indexOf("month"))
                return;
            c = 12, d = "month"
        }
        tb[b] = function (e, f) {
            var g, h, i = tb._locale[b], j = [];
            if ("number" == typeof e && (f = e, e = a), h = function (a) {
                var b = tb().utc().set(d, a);
                return i.call(tb._locale, b, e || "")
            }, null != f)
                return h(f);
            for (g = 0; c > g; g++)
                j.push(h(g));
            return j
        }
    }
    function A(a) {
        var b = +a, c = 0;
        return 0 !== b && isFinite(b) && (c = b >= 0 ? Math.floor(b) : Math.ceil(b)), c
    }
    function B(a, b) {
        return new Date(Date.UTC(a, b + 1, 0)).getUTCDate()
    }
    function C(a, b, c) {
        return hb(tb([a, 11, 31 + b - c]), b, c).week
    }
    function D(a) {
        return E(a) ? 366 : 365
    }
    function E(a) {
        return a % 4 === 0 && a % 100 !== 0 || a % 400 === 0
    }
    function F(a) {
        var b;
        a._a && -2 === a._pf.overflow && (b = a._a[Bb] < 0 || a._a[Bb] > 11 ? Bb : a._a[Cb] < 1 || a._a[Cb] > B(a._a[Ab], a._a[Bb]) ? Cb : a._a[Db] < 0 || a._a[Db] > 24 || 24 === a._a[Db] && (0 !== a._a[Eb] || 0 !== a._a[Fb] || 0 !== a._a[Gb]) ? Db : a._a[Eb] < 0 || a._a[Eb] > 59 ? Eb : a._a[Fb] < 0 || a._a[Fb] > 59 ? Fb : a._a[Gb] < 0 || a._a[Gb] > 999 ? Gb : -1, a._pf._overflowDayOfYear && (Ab > b || b > Cb) && (b = Cb), a._pf.overflow = b)
    }
    function G(b) {
        return null == b._isValid && (b._isValid = !isNaN(b._d.getTime()) && b._pf.overflow < 0 && !b._pf.empty && !b._pf.invalidMonth && !b._pf.nullInput && !b._pf.invalidFormat && !b._pf.userInvalidated, b._strict && (b._isValid = b._isValid && 0 === b._pf.charsLeftOver && 0 === b._pf.unusedTokens.length && b._pf.bigHour === a)), b._isValid
    }
    function H(a) {
        return a ? a.toLowerCase().replace("_", "-") : a
    }
    function I(a) {
        for (var b, c, d, e, f = 0; f < a.length; ) {
            for (e = H(a[f]).split("-"), b = e.length, c = H(a[f + 1]), c = c ? c.split("-") : null; b > 0; ) {
                if (d = J(e.slice(0, b).join("-")))
                    return d;
                if (c && c.length >= b && w(e, c, !0) >= b - 1)
                    break;
                b--
            }
            f++
        }
        return null
    }
    function J(a) {
        var b = null;
        if (!Hb[a] && Jb)
            try {
                b = tb.locale(), require("./locale/" + a), tb.locale(b)
            } catch (c) {
            }
        return Hb[a]
    }
    function K(a, b) {
        var c, d;
        return b._isUTC ? (c = b.clone(), d = (tb.isMoment(a) || v(a) ? +a : +tb(a)) - +c, c._d.setTime(+c._d + d), tb.updateOffset(c, !1), c) : tb(a).local()
    }
    function L(a) {
        return a.match(/\[[\s\S]/) ? a.replace(/^\[|\]$/g, "") : a.replace(/\\/g, "")
    }
    function M(a) {
        var b, c, d = a.match(Nb);
        for (b = 0, c = d.length; c > b; b++)
            d[b] = pc[d[b]] ? pc[d[b]] : L(d[b]);
        return function (e) {
            var f = "";
            for (b = 0; c > b; b++)
                f += d[b]instanceof Function ? d[b].call(e, a) : d[b];
            return f
        }
    }
    function N(a, b) {
        return a.isValid() ? (b = O(b, a.localeData()), lc[b] || (lc[b] = M(b)), lc[b](a)) : a.localeData().invalidDate()
    }
    function O(a, b) {
        function c(a) {
            return b.longDateFormat(a) || a
        }
        var d = 5;
        for (Ob.lastIndex = 0; d >= 0 && Ob.test(a); )
            a = a.replace(Ob, c), Ob.lastIndex = 0, d -= 1;
        return a
    }
    function P(a, b) {
        var c, d = b._strict;
        switch (a) {
            case"Q":
                return Zb;
            case"DDDD":
                return _b;
            case"YYYY":
            case"GGGG":
            case"gggg":
                return d ? ac : Rb;
            case"Y":
            case"G":
            case"g":
                return cc;
            case"YYYYYY":
            case"YYYYY":
            case"GGGGG":
            case"ggggg":
                return d ? bc : Sb;
            case"S":
                if (d)
                    return Zb;
            case"SS":
                if (d)
                    return $b;
            case"SSS":
                if (d)
                    return _b;
            case"DDD":
                return Qb;
            case"MMM":
            case"MMMM":
            case"dd":
            case"ddd":
            case"dddd":
                return Ub;
            case"a":
            case"A":
                return b._locale._meridiemParse;
            case"x":
                return Xb;
            case"X":
                return Yb;
            case"Z":
            case"ZZ":
                return Vb;
            case"T":
                return Wb;
            case"SSSS":
                return Tb;
            case"MM":
            case"DD":
            case"YY":
            case"GG":
            case"gg":
            case"HH":
            case"hh":
            case"mm":
            case"ss":
            case"ww":
            case"WW":
                return d ? $b : Pb;
            case"M":
            case"D":
            case"d":
            case"H":
            case"h":
            case"m":
            case"s":
            case"w":
            case"W":
            case"e":
            case"E":
                return Pb;
            case"Do":
                return d ? b._locale._ordinalParse : b._locale._ordinalParseLenient;
            default:
                return c = new RegExp(Y(X(a.replace("\\", "")), "i"))
            }
    }
    function Q(a) {
        a = a || "";
        var b = a.match(Vb) || [], c = b[b.length - 1] || [], d = (c + "").match(hc) || ["-", 0, 0], e = +(60 * d[1]) + A(d[2]);
        return"+" === d[0] ? -e : e
    }
    function R(a, b, c) {
        var d, e = c._a;
        switch (a) {
            case"Q":
                null != b && (e[Bb] = 3 * (A(b) - 1));
                break;
            case"M":
            case"MM":
                null != b && (e[Bb] = A(b) - 1);
                break;
            case"MMM":
            case"MMMM":
                d = c._locale.monthsParse(b, a, c._strict), null != d ? e[Bb] = d : c._pf.invalidMonth = b;
                break;
            case"D":
            case"DD":
                null != b && (e[Cb] = A(b));
                break;
            case"Do":
                null != b && (e[Cb] = A(parseInt(b.match(/\d{1,2}/)[0], 10)));
                break;
            case"DDD":
            case"DDDD":
                null != b && (c._dayOfYear = A(b));
                break;
            case"YY":
                e[Ab] = tb.parseTwoDigitYear(b);
                break;
            case"YYYY":
            case"YYYYY":
            case"YYYYYY":
                e[Ab] = A(b);
                break;
            case"a":
            case"A":
                c._isPm = c._locale.isPM(b);
                break;
            case"h":
            case"hh":
                c._pf.bigHour = !0;
            case"H":
            case"HH":
                e[Db] = A(b);
                break;
            case"m":
            case"mm":
                e[Eb] = A(b);
                break;
            case"s":
            case"ss":
                e[Fb] = A(b);
                break;
            case"S":
            case"SS":
            case"SSS":
            case"SSSS":
                e[Gb] = A(1e3 * ("0." + b));
                break;
            case"x":
                c._d = new Date(A(b));
                break;
            case"X":
                c._d = new Date(1e3 * parseFloat(b));
                break;
            case"Z":
            case"ZZ":
                c._useUTC = !0, c._tzm = Q(b);
                break;
            case"dd":
            case"ddd":
            case"dddd":
                d = c._locale.weekdaysParse(b), null != d ? (c._w = c._w || {}, c._w.d = d) : c._pf.invalidWeekday = b;
                break;
            case"w":
            case"ww":
            case"W":
            case"WW":
            case"d":
            case"e":
            case"E":
                a = a.substr(0, 1);
            case"gggg":
            case"GGGG":
            case"GGGGG":
                a = a.substr(0, 2), b && (c._w = c._w || {}, c._w[a] = A(b));
                break;
            case"gg":
            case"GG":
                c._w = c._w || {}, c._w[a] = tb.parseTwoDigitYear(b)
            }
    }
    function S(a) {
        var c, d, e, f, g, h, i;
        c = a._w, null != c.GG || null != c.W || null != c.E ? (g = 1, h = 4, d = b(c.GG, a._a[Ab], hb(tb(), 1, 4).year), e = b(c.W, 1), f = b(c.E, 1)) : (g = a._locale._week.dow, h = a._locale._week.doy, d = b(c.gg, a._a[Ab], hb(tb(), g, h).year), e = b(c.w, 1), null != c.d ? (f = c.d, g > f && ++e) : f = null != c.e ? c.e + g : g), i = ib(d, e, f, h, g), a._a[Ab] = i.year, a._dayOfYear = i.dayOfYear
    }
    function T(a) {
        var c, d, e, f, g = [];
        if (!a._d) {
            for (e = V(a), a._w && null == a._a[Cb] && null == a._a[Bb] && S(a), a._dayOfYear && (f = b(a._a[Ab], e[Ab]), a._dayOfYear > D(f) && (a._pf._overflowDayOfYear = !0), d = db(f, 0, a._dayOfYear), a._a[Bb] = d.getUTCMonth(), a._a[Cb] = d.getUTCDate()), c = 0; 3 > c && null == a._a[c]; ++c)
                a._a[c] = g[c] = e[c];
            for (; 7 > c; c++)
                a._a[c] = g[c] = null == a._a[c] ? 2 === c ? 1 : 0 : a._a[c];
            24 === a._a[Db] && 0 === a._a[Eb] && 0 === a._a[Fb] && 0 === a._a[Gb] && (a._nextDay = !0, a._a[Db] = 0), a._d = (a._useUTC ? db : cb).apply(null, g), null != a._tzm && a._d.setUTCMinutes(a._d.getUTCMinutes() + a._tzm), a._nextDay && (a._a[Db] = 24)
        }
    }
    function U(a) {
        var b;
        a._d || (b = y(a._i), a._a = [b.year, b.month, b.day || b.date, b.hour, b.minute, b.second, b.millisecond], T(a))
    }
    function V(a) {
        var b = new Date;
        return a._useUTC ? [b.getUTCFullYear(), b.getUTCMonth(), b.getUTCDate()] : [b.getFullYear(), b.getMonth(), b.getDate()]
    }
    function W(b) {
        if (b._f === tb.ISO_8601)
            return void $(b);
        b._a = [], b._pf.empty = !0;
        var c, d, e, f, g, h = "" + b._i, i = h.length, j = 0;
        for (e = O(b._f, b._locale).match(Nb) || [], c = 0; c < e.length; c++)
            f = e[c], d = (h.match(P(f, b)) || [])[0], d && (g = h.substr(0, h.indexOf(d)), g.length > 0 && b._pf.unusedInput.push(g), h = h.slice(h.indexOf(d) + d.length), j += d.length), pc[f] ? (d ? b._pf.empty = !1 : b._pf.unusedTokens.push(f), R(f, d, b)) : b._strict && !d && b._pf.unusedTokens.push(f);
        b._pf.charsLeftOver = i - j, h.length > 0 && b._pf.unusedInput.push(h), b._pf.bigHour === !0 && b._a[Db] <= 12 && (b._pf.bigHour = a), b._isPm && b._a[Db] < 12 && (b._a[Db] += 12), b._isPm === !1 && 12 === b._a[Db] && (b._a[Db] = 0), T(b), F(b)
    }
    function X(a) {
        return a.replace(/\\(\[)|\\(\])|\[([^\]\[]*)\]|\\(.)/g, function (a, b, c, d, e) {
            return b || c || d || e
        })
    }
    function Y(a) {
        return a.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&")
    }
    function Z(a) {
        var b, c, e, f, g;
        if (0 === a._f.length)
            return a._pf.invalidFormat = !0, void(a._d = new Date(0 / 0));
        for (f = 0; f < a._f.length; f++)
            g = 0, b = n({}, a), null != a._useUTC && (b._useUTC = a._useUTC), b._pf = d(), b._f = a._f[f], W(b), G(b) && (g += b._pf.charsLeftOver, g += 10 * b._pf.unusedTokens.length, b._pf.score = g, (null == e || e > g) && (e = g, c = b));
        m(a, c || b)
    }
    function $(a) {
        var b, c, d = a._i, e = dc.exec(d);
        if (e) {
            for (a._pf.iso = !0, b = 0, c = fc.length; c > b; b++)
                if (fc[b][1].exec(d)) {
                    a._f = fc[b][0] + (e[6] || " ");
                    break
                }
            for (b = 0, c = gc.length; c > b; b++)
                if (gc[b][1].exec(d)) {
                    a._f += gc[b][0];
                    break
                }
            d.match(Vb) && (a._f += "Z"), W(a)
        } else
            a._isValid = !1
    }
    function _(a) {
        $(a), a._isValid === !1 && (delete a._isValid, tb.createFromInputFallback(a))
    }
    function ab(a, b) {
        var c, d = [];
        for (c = 0; c < a.length; ++c)
            d.push(b(a[c], c));
        return d
    }
    function bb(b) {
        var c, d = b._i;
        d === a ? b._d = new Date : v(d) ? b._d = new Date(+d) : null !== (c = Kb.exec(d)) ? b._d = new Date(+c[1]) : "string" == typeof d ? _(b) : u(d) ? (b._a = ab(d.slice(0), function (a) {
            return parseInt(a, 10)
        }), T(b)) : "object" == typeof d ? U(b) : "number" == typeof d ? b._d = new Date(d) : tb.createFromInputFallback(b)
    }
    function cb(a, b, c, d, e, f, g) {
        var h = new Date(a, b, c, d, e, f, g);
        return 1970 > a && h.setFullYear(a), h
    }
    function db(a) {
        var b = new Date(Date.UTC.apply(null, arguments));
        return 1970 > a && b.setUTCFullYear(a), b
    }
    function eb(a, b) {
        if ("string" == typeof a)
            if (isNaN(a)) {
                if (a = b.weekdaysParse(a), "number" != typeof a)
                    return null
            } else
                a = parseInt(a, 10);
        return a
    }
    function fb(a, b, c, d, e) {
        return e.relativeTime(b || 1, !!c, a, d)
    }
    function gb(a, b, c) {
        var d = tb.duration(a).abs(), e = yb(d.as("s")), f = yb(d.as("m")), g = yb(d.as("h")), h = yb(d.as("d")), i = yb(d.as("M")), j = yb(d.as("y")), k = e < mc.s && ["s", e] || 1 === f && ["m"] || f < mc.m && ["mm", f] || 1 === g && ["h"] || g < mc.h && ["hh", g] || 1 === h && ["d"] || h < mc.d && ["dd", h] || 1 === i && ["M"] || i < mc.M && ["MM", i] || 1 === j && ["y"] || ["yy", j];
        return k[2] = b, k[3] = +a > 0, k[4] = c, fb.apply({}, k)
    }
    function hb(a, b, c) {
        var d, e = c - b, f = c - a.day();
        return f > e && (f -= 7), e - 7 > f && (f += 7), d = tb(a).add(f, "d"), {week: Math.ceil(d.dayOfYear() / 7), year: d.year()}
    }
    function ib(a, b, c, d, e) {
        var f, g, h = db(a, 0, 1).getUTCDay();
        return h = 0 === h ? 7 : h, c = null != c ? c : e, f = e - h + (h > d ? 7 : 0) - (e > h ? 7 : 0), g = 7 * (b - 1) + (c - e) + f + 1, {year: g > 0 ? a : a - 1, dayOfYear: g > 0 ? g : D(a - 1) + g}
    }
    function jb(b) {
        var c, d = b._i, e = b._f;
        return b._locale = b._locale || tb.localeData(b._l), null === d || e === a && "" === d ? tb.invalid({nullInput: !0}) : ("string" == typeof d && (b._i = d = b._locale.preparse(d)), tb.isMoment(d) ? new k(d, !0) : (e ? u(e) ? Z(b) : W(b) : bb(b), c = new k(b), c._nextDay && (c.add(1, "d"), c._nextDay = a), c))
    }
    function kb(a, b) {
        var c, d;
        if (1 === b.length && u(b[0]) && (b = b[0]), !b.length)
            return tb();
        for (c = b[0], d = 1; d < b.length; ++d)
            b[d][a](c) && (c = b[d]);
        return c
    }
    function lb(a, b) {
        var c;
        return"string" == typeof b && (b = a.localeData().monthsParse(b), "number" != typeof b) ? a : (c = Math.min(a.date(), B(a.year(), b)), a._d["set" + (a._isUTC ? "UTC" : "") + "Month"](b, c), a)
    }
    function mb(a, b) {
        return a._d["get" + (a._isUTC ? "UTC" : "") + b]()
    }
    function nb(a, b, c) {
        return"Month" === b ? lb(a, c) : a._d["set" + (a._isUTC ? "UTC" : "") + b](c)
    }
    function ob(a, b) {
        return function (c) {
            return null != c ? (nb(this, a, c), tb.updateOffset(this, b), this) : mb(this, a)
        }
    }
    function pb(a) {
        return 400 * a / 146097
    }
    function qb(a) {
        return 146097 * a / 400
    }
    function rb(a) {
        tb.duration.fn[a] = function () {
            return this._data[a]
        }
    }
    function sb(a) {
        "undefined" == typeof ender && (ub = xb.moment, xb.moment = a ? f("Accessing Moment through the global scope is deprecated, and will be removed in an upcoming release.", tb) : tb)
    }
    for (var tb, ub, vb, wb = "2.8.4", xb = "undefined" != typeof global ? global : this, yb = Math.round, zb = Object.prototype.hasOwnProperty, Ab = 0, Bb = 1, Cb = 2, Db = 3, Eb = 4, Fb = 5, Gb = 6, Hb = {}, Ib = [], Jb = "undefined" != typeof module && module && module.exports, Kb = /^\/?Date\((\-?\d+)/i, Lb = /(\-)?(?:(\d*)\.)?(\d+)\:(\d+)(?:\:(\d+)\.?(\d{3})?)?/, Mb = /^(-)?P(?:(?:([0-9,.]*)Y)?(?:([0-9,.]*)M)?(?:([0-9,.]*)D)?(?:T(?:([0-9,.]*)H)?(?:([0-9,.]*)M)?(?:([0-9,.]*)S)?)?|([0-9,.]*)W)$/, Nb = /(\[[^\[]*\])|(\\)?(Mo|MM?M?M?|Do|DDDo|DD?D?D?|ddd?d?|do?|w[o|w]?|W[o|W]?|Q|YYYYYY|YYYYY|YYYY|YY|gg(ggg?)?|GG(GGG?)?|e|E|a|A|hh?|HH?|mm?|ss?|S{1,4}|x|X|zz?|ZZ?|.)/g, Ob = /(\[[^\[]*\])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g, Pb = /\d\d?/, Qb = /\d{1,3}/, Rb = /\d{1,4}/, Sb = /[+\-]?\d{1,6}/, Tb = /\d+/, Ub = /[0-9]*['a-z\u00A0-\u05FF\u0700-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+|[\u0600-\u06FF\/]+(\s*?[\u0600-\u06FF]+){1,2}/i, Vb = /Z|[\+\-]\d\d:?\d\d/gi, Wb = /T/i, Xb = /[\+\-]?\d+/, Yb = /[\+\-]?\d+(\.\d{1,3})?/, Zb = /\d/, $b = /\d\d/, _b = /\d{3}/, ac = /\d{4}/, bc = /[+-]?\d{6}/, cc = /[+-]?\d+/, dc = /^\s*(?:[+-]\d{6}|\d{4})-(?:(\d\d-\d\d)|(W\d\d$)|(W\d\d-\d)|(\d\d\d))((T| )(\d\d(:\d\d(:\d\d(\.\d+)?)?)?)?([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?$/, ec = "YYYY-MM-DDTHH:mm:ssZ", fc = [["YYYYYY-MM-DD", /[+-]\d{6}-\d{2}-\d{2}/], ["YYYY-MM-DD", /\d{4}-\d{2}-\d{2}/], ["GGGG-[W]WW-E", /\d{4}-W\d{2}-\d/], ["GGGG-[W]WW", /\d{4}-W\d{2}/], ["YYYY-DDD", /\d{4}-\d{3}/]], gc = [["HH:mm:ss.SSSS", /(T| )\d\d:\d\d:\d\d\.\d+/], ["HH:mm:ss", /(T| )\d\d:\d\d:\d\d/], ["HH:mm", /(T| )\d\d:\d\d/], ["HH", /(T| )\d\d/]], hc = /([\+\-]|\d\d)/gi, ic = ("Date|Hours|Minutes|Seconds|Milliseconds".split("|"), {Milliseconds: 1, Seconds: 1e3, Minutes: 6e4, Hours: 36e5, Days: 864e5, Months: 2592e6, Years: 31536e6}), jc = {ms: "millisecond", s: "second", m: "minute", h: "hour", d: "day", D: "date", w: "week", W: "isoWeek", M: "month", Q: "quarter", y: "year", DDD: "dayOfYear", e: "weekday", E: "isoWeekday", gg: "weekYear", GG: "isoWeekYear"}, kc = {dayofyear: "dayOfYear", isoweekday: "isoWeekday", isoweek: "isoWeek", weekyear: "weekYear", isoweekyear: "isoWeekYear"}, lc = {}, mc = {s: 45, m: 45, h: 22, d: 26, M: 11}, nc = "DDD w W M D d".split(" "), oc = "M D H h m s w W".split(" "), pc = {M: function () {
            return this.month() + 1
        }, MMM: function (a) {
            return this.localeData().monthsShort(this, a)
        }, MMMM: function (a) {
            return this.localeData().months(this, a)
        }, D: function () {
            return this.date()
        }, DDD: function () {
            return this.dayOfYear()
        }, d: function () {
            return this.day()
        }, dd: function (a) {
            return this.localeData().weekdaysMin(this, a)
        }, ddd: function (a) {
            return this.localeData().weekdaysShort(this, a)
        }, dddd: function (a) {
            return this.localeData().weekdays(this, a)
        }, w: function () {
            return this.week()
        }, W: function () {
            return this.isoWeek()
        }, YY: function () {
            return p(this.year() % 100, 2)
        }, YYYY: function () {
            return p(this.year(), 4)
        }, YYYYY: function () {
            return p(this.year(), 5)
        }, YYYYYY: function () {
            var a = this.year(), b = a >= 0 ? "+" : "-";
            return b + p(Math.abs(a), 6)
        }, gg: function () {
            return p(this.weekYear() % 100, 2)
        }, gggg: function () {
            return p(this.weekYear(), 4)
        }, ggggg: function () {
            return p(this.weekYear(), 5)
        }, GG: function () {
            return p(this.isoWeekYear() % 100, 2)
        }, GGGG: function () {
            return p(this.isoWeekYear(), 4)
        }, GGGGG: function () {
            return p(this.isoWeekYear(), 5)
        }, e: function () {
            return this.weekday()
        }, E: function () {
            return this.isoWeekday()
        }, a: function () {
            return this.localeData().meridiem(this.hours(), this.minutes(), !0)
        }, A: function () {
            return this.localeData().meridiem(this.hours(), this.minutes(), !1)
        }, H: function () {
            return this.hours()
        }, h: function () {
            return this.hours() % 12 || 12
        }, m: function () {
            return this.minutes()
        }, s: function () {
            return this.seconds()
        }, S: function () {
            return A(this.milliseconds() / 100)
        }, SS: function () {
            return p(A(this.milliseconds() / 10), 2)
        }, SSS: function () {
            return p(this.milliseconds(), 3)
        }, SSSS: function () {
            return p(this.milliseconds(), 3)
        }, Z: function () {
            var a = -this.zone(), b = "+";
            return 0 > a && (a = -a, b = "-"), b + p(A(a / 60), 2) + ":" + p(A(a) % 60, 2)
        }, ZZ: function () {
            var a = -this.zone(), b = "+";
            return 0 > a && (a = -a, b = "-"), b + p(A(a / 60), 2) + p(A(a) % 60, 2)
        }, z: function () {
            return this.zoneAbbr()
        }, zz: function () {
            return this.zoneName()
        }, x: function () {
            return this.valueOf()
        }, X: function () {
            return this.unix()
        }, Q: function () {
            return this.quarter()
        }}, qc = {}, rc = ["months", "monthsShort", "weekdays", "weekdaysShort", "weekdaysMin"]; nc.length; )
        vb = nc.pop(), pc[vb + "o"] = i(pc[vb], vb);
    for (; oc.length; )
        vb = oc.pop(), pc[vb + vb] = h(pc[vb], 2);
    pc.DDDD = h(pc.DDD, 3), m(j.prototype, {set: function (a) {
            var b, c;
            for (c in a)
                b = a[c], "function" == typeof b ? this[c] = b : this["_" + c] = b;
            this._ordinalParseLenient = new RegExp(this._ordinalParse.source + "|" + /\d{1,2}/.source)
        }, _months: "Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre".split("_"), months: function (a) {
            return this._months[a.month()]
        }, _monthsShort: "Ene_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dic".split("_"), monthsShort: function (a) {
            return this._monthsShort[a.month()]
        }, monthsParse: function (a, b, c) {
            var d, e, f;
            for (this._monthsParse || (this._monthsParse = [], this._longMonthsParse = [], this._shortMonthsParse = []), d = 0; 12 > d; d++) {
                if (e = tb.utc([2e3, d]), c && !this._longMonthsParse[d] && (this._longMonthsParse[d] = new RegExp("^" + this.months(e, "").replace(".", "") + "$", "i"), this._shortMonthsParse[d] = new RegExp("^" + this.monthsShort(e, "").replace(".", "") + "$", "i")), c || this._monthsParse[d] || (f = "^" + this.months(e, "") + "|^" + this.monthsShort(e, ""), this._monthsParse[d] = new RegExp(f.replace(".", ""), "i")), c && "MMMM" === b && this._longMonthsParse[d].test(a))
                    return d;
                if (c && "MMM" === b && this._shortMonthsParse[d].test(a))
                    return d;
                if (!c && this._monthsParse[d].test(a))
                    return d
            }
        }, _weekdays: "Domingo_Lunes_Martes_Miercoles_Jueves_Viernes_Sabado".split("_"), weekdays: function (a) {
            return this._weekdays[a.day()]
        }, _weekdaysShort: "Dom_Lun_Mar_Mie_Jue_Vie_Sab".split("_"), weekdaysShort: function (a) {
            return this._weekdaysShort[a.day()]
        }, _weekdaysMin: "Dom_Lun_Mar_Mie_Jue_Vie_Sab".split("_"), weekdaysMin: function (a) {
            return this._weekdaysMin[a.day()]
        }, weekdaysParse: function (a) {
            var b, c, d;
            for (this._weekdaysParse || (this._weekdaysParse = []), b = 0; 7 > b; b++)
                if (this._weekdaysParse[b] || (c = tb([2e3, 1]).day(b), d = "^" + this.weekdays(c, "") + "|^" + this.weekdaysShort(c, "") + "|^" + this.weekdaysMin(c, ""), this._weekdaysParse[b] = new RegExp(d.replace(".", ""), "i")), this._weekdaysParse[b].test(a))
                    return b
        }, _longDateFormat: {LTS: "h:mm:ss A", LT: "h:mm A", L: "DD/MM/YYYY", LL: "MMMM D, YYYY", LLL: "MMMM D, YYYY LT", LLLL: "dddd, MMMM D, YYYY LT"}, longDateFormat: function (a) {
            var b = this._longDateFormat[a];
            return!b && this._longDateFormat[a.toUpperCase()] && (b = this._longDateFormat[a.toUpperCase()].replace(/MMMM|MM|DD|dddd/g, function (a) {
                return a.slice(1)
            }), this._longDateFormat[a] = b), b
        }, isPM: function (a) {
            return"p" === (a + "").toLowerCase().charAt(0)
        }, _meridiemParse: /[ap]\.?m?\.?/i, meridiem: function (a, b, c) {
            return a > 11 ? c ? "pm" : "PM" : c ? "am" : "AM"
        }, _calendar: {sameDay: "[Today at] LT", nextDay: "[Tomorrow at] LT", nextWeek: "dddd [at] LT", lastDay: "[Yesterday at] LT", lastWeek: "[Last] dddd [at] LT", sameElse: "L"}, calendar: function (a, b, c) {
            var d = this._calendar[a];
            return"function" == typeof d ? d.apply(b, [c]) : d
        }, _relativeTime: {future: "in %s", past: "%s ago", s: "a few seconds", m: "a minute", mm: "%d minutes", h: "an hour", hh: "%d hours", d: "a day", dd: "%d days", M: "a month", MM: "%d months", y: "a year", yy: "%d years"}, relativeTime: function (a, b, c, d) {
            var e = this._relativeTime[c];
            return"function" == typeof e ? e(a, b, c, d) : e.replace(/%d/i, a)
        }, pastFuture: function (a, b) {
            var c = this._relativeTime[a > 0 ? "future" : "past"];
            return"function" == typeof c ? c(b) : c.replace(/%s/i, b)
        }, ordinal: function (a) {
            return this._ordinal.replace("%d", a)
        }, _ordinal: "%d", _ordinalParse: /\d{1,2}/, preparse: function (a) {
            return a
        }, postformat: function (a) {
            return a
        }, week: function (a) {
            return hb(a, this._week.dow, this._week.doy).week
        }, _week: {dow: 0, doy: 6}, _invalidDate: "Invalid date", invalidDate: function () {
            return this._invalidDate
        }}), tb = function (b, c, e, f) {
        var g;
        return"boolean" == typeof e && (f = e, e = a), g = {}, g._isAMomentObject = !0, g._i = b, g._f = c, g._l = e, g._strict = f, g._isUTC = !1, g._pf = d(), jb(g)
    }, tb.suppressDeprecationWarnings = !1, tb.createFromInputFallback = f("moment construction falls back to js Date. This is discouraged and will be removed in upcoming major release. Please refer to https://github.com/moment/moment/issues/1407 for more info.", function (a) {
        a._d = new Date(a._i + (a._useUTC ? " UTC" : ""))
    }), tb.min = function () {
        var a = [].slice.call(arguments, 0);
        return kb("isBefore", a)
    }, tb.max = function () {
        var a = [].slice.call(arguments, 0);
        return kb("isAfter", a)
    }, tb.utc = function (b, c, e, f) {
        var g;
        return"boolean" == typeof e && (f = e, e = a), g = {}, g._isAMomentObject = !0, g._useUTC = !0, g._isUTC = !0, g._l = e, g._i = b, g._f = c, g._strict = f, g._pf = d(), jb(g).utc()
    }, tb.unix = function (a) {
        return tb(1e3 * a)
    }, tb.duration = function (a, b) {
        var d, e, f, g, h = a, i = null;
        return tb.isDuration(a) ? h = {ms: a._milliseconds, d: a._days, M: a._months} : "number" == typeof a ? (h = {}, b ? h[b] = a : h.milliseconds = a) : (i = Lb.exec(a)) ? (d = "-" === i[1] ? -1 : 1, h = {y: 0, d: A(i[Cb]) * d, h: A(i[Db]) * d, m: A(i[Eb]) * d, s: A(i[Fb]) * d, ms: A(i[Gb]) * d}) : (i = Mb.exec(a)) ? (d = "-" === i[1] ? -1 : 1, f = function (a) {
            var b = a && parseFloat(a.replace(",", "."));
            return(isNaN(b) ? 0 : b) * d
        }, h = {y: f(i[2]), M: f(i[3]), d: f(i[4]), h: f(i[5]), m: f(i[6]), s: f(i[7]), w: f(i[8])}) : "object" == typeof h && ("from"in h || "to"in h) && (g = r(tb(h.from), tb(h.to)), h = {}, h.ms = g.milliseconds, h.M = g.months), e = new l(h), tb.isDuration(a) && c(a, "_locale") && (e._locale = a._locale), e
    }, tb.version = wb, tb.defaultFormat = ec, tb.ISO_8601 = function () {
    }, tb.momentProperties = Ib, tb.updateOffset = function () {
    }, tb.relativeTimeThreshold = function (b, c) {
        return mc[b] === a ? !1 : c === a ? mc[b] : (mc[b] = c, !0)
    }, tb.lang = f("moment.lang is deprecated. Use moment.locale instead.", function (a, b) {
        return tb.locale(a, b)
    }), tb.locale = function (a, b) {
        var c;
        return a && (c = "undefined" != typeof b ? tb.defineLocale(a, b) : tb.localeData(a), c && (tb.duration._locale = tb._locale = c)), tb._locale._abbr
    }, tb.defineLocale = function (a, b) {
        return null !== b ? (b.abbr = a, Hb[a] || (Hb[a] = new j), Hb[a].set(b), tb.locale(a), Hb[a]) : (delete Hb[a], null)
    }, tb.langData = f("moment.langData is deprecated. Use moment.localeData instead.", function (a) {
        return tb.localeData(a)
    }), tb.localeData = function (a) {
        var b;
        if (a && a._locale && a._locale._abbr && (a = a._locale._abbr), !a)
            return tb._locale;
        if (!u(a)) {
            if (b = J(a))
                return b;
            a = [a]
        }
        return I(a)
    }, tb.isMoment = function (a) {
        return a instanceof k || null != a && c(a, "_isAMomentObject")
    }, tb.isDuration = function (a) {
        return a instanceof l
    };
    for (vb = rc.length - 1; vb >= 0; --vb)
        z(rc[vb]);
    tb.normalizeUnits = function (a) {
        return x(a)
    }, tb.invalid = function (a) {
        var b = tb.utc(0 / 0);
        return null != a ? m(b._pf, a) : b._pf.userInvalidated = !0, b
    }, tb.parseZone = function () {
        return tb.apply(null, arguments).parseZone()
    }, tb.parseTwoDigitYear = function (a) {
        return A(a) + (A(a) > 68 ? 1900 : 2e3)
    }, m(tb.fn = k.prototype, {clone: function () {
            return tb(this)
        }, valueOf: function () {
            return +this._d + 6e4 * (this._offset || 0)
        }, unix: function () {
            return Math.floor(+this / 1e3)
        }, toString: function () {
            return this.clone().locale("en").format("ddd MMM DD YYYY HH:mm:ss [GMT]ZZ")
        }, toDate: function () {
            return this._offset ? new Date(+this) : this._d
        }, toISOString: function () {
            var a = tb(this).utc();
            return 0 < a.year() && a.year() <= 9999 ? "function" == typeof Date.prototype.toISOString ? this.toDate().toISOString() : N(a, "YYYY-MM-DD[T]HH:mm:ss.SSS[Z]") : N(a, "YYYYYY-MM-DD[T]HH:mm:ss.SSS[Z]")
        }, toArray: function () {
            var a = this;
            return[a.year(), a.month(), a.date(), a.hours(), a.minutes(), a.seconds(), a.milliseconds()]
        }, isValid: function () {
            return G(this)
        }, isDSTShifted: function () {
            return this._a ? this.isValid() && w(this._a, (this._isUTC ? tb.utc(this._a) : tb(this._a)).toArray()) > 0 : !1
        }, parsingFlags: function () {
            return m({}, this._pf)
        }, invalidAt: function () {
            return this._pf.overflow
        }, utc: function (a) {
            return this.zone(0, a)
        }, local: function (a) {
            return this._isUTC && (this.zone(0, a), this._isUTC = !1, a && this.add(this._dateTzOffset(), "m")), this
        }, format: function (a) {
            var b = N(this, a || tb.defaultFormat);
            return this.localeData().postformat(b)
        }, add: s(1, "add"), subtract: s(-1, "subtract"), diff: function (a, b, c) {
            var d, e, f, g = K(a, this), h = 6e4 * (this.zone() - g.zone());
            return b = x(b), "year" === b || "month" === b ? (d = 432e5 * (this.daysInMonth() + g.daysInMonth()), e = 12 * (this.year() - g.year()) + (this.month() - g.month()), f = this - tb(this).startOf("month") - (g - tb(g).startOf("month")), f -= 6e4 * (this.zone() - tb(this).startOf("month").zone() - (g.zone() - tb(g).startOf("month").zone())), e += f / d, "year" === b && (e /= 12)) : (d = this - g, e = "second" === b ? d / 1e3 : "minute" === b ? d / 6e4 : "hour" === b ? d / 36e5 : "day" === b ? (d - h) / 864e5 : "week" === b ? (d - h) / 6048e5 : d), c ? e : o(e)
        }, from: function (a, b) {
            return tb.duration({to: this, from: a}).locale(this.locale()).humanize(!b)
        }, fromNow: function (a) {
            return this.from(tb(), a)
        }, calendar: function (a) {
            var b = a || tb(), c = K(b, this).startOf("day"), d = this.diff(c, "days", !0), e = -6 > d ? "sameElse" : -1 > d ? "lastWeek" : 0 > d ? "lastDay" : 1 > d ? "sameDay" : 2 > d ? "nextDay" : 7 > d ? "nextWeek" : "sameElse";
            return this.format(this.localeData().calendar(e, this, tb(b)))
        }, isLeapYear: function () {
            return E(this.year())
        }, isDST: function () {
            return this.zone() < this.clone().month(0).zone() || this.zone() < this.clone().month(5).zone()
        }, day: function (a) {
            var b = this._isUTC ? this._d.getUTCDay() : this._d.getDay();
            return null != a ? (a = eb(a, this.localeData()), this.add(a - b, "d")) : b
        }, month: ob("Month", !0), startOf: function (a) {
            switch (a = x(a)) {
                case"year":
                    this.month(0);
                case"quarter":
                case"month":
                    this.date(1);
                case"week":
                case"isoWeek":
                case"day":
                    this.hours(0);
                case"hour":
                    this.minutes(0);
                case"minute":
                    this.seconds(0);
                case"second":
                    this.milliseconds(0)
            }
            return"week" === a ? this.weekday(0) : "isoWeek" === a && this.isoWeekday(1), "quarter" === a && this.month(3 * Math.floor(this.month() / 3)), this
        }, endOf: function (b) {
            return b = x(b), b === a || "millisecond" === b ? this : this.startOf(b).add(1, "isoWeek" === b ? "week" : b).subtract(1, "ms")
        }, isAfter: function (a, b) {
            var c;
            return b = x("undefined" != typeof b ? b : "millisecond"), "millisecond" === b ? (a = tb.isMoment(a) ? a : tb(a), +this > +a) : (c = tb.isMoment(a) ? +a : +tb(a), c < +this.clone().startOf(b))
        }, isBefore: function (a, b) {
            var c;
            return b = x("undefined" != typeof b ? b : "millisecond"), "millisecond" === b ? (a = tb.isMoment(a) ? a : tb(a), +a > +this) : (c = tb.isMoment(a) ? +a : +tb(a), +this.clone().endOf(b) < c)
        }, isSame: function (a, b) {
            var c;
            return b = x(b || "millisecond"), "millisecond" === b ? (a = tb.isMoment(a) ? a : tb(a), +this === +a) : (c = +tb(a), +this.clone().startOf(b) <= c && c <= +this.clone().endOf(b))
        }, min: f("moment().min is deprecated, use moment.min instead. https://github.com/moment/moment/issues/1548", function (a) {
            return a = tb.apply(null, arguments), this > a ? this : a
        }), max: f("moment().max is deprecated, use moment.max instead. https://github.com/moment/moment/issues/1548", function (a) {
            return a = tb.apply(null, arguments), a > this ? this : a
        }), zone: function (a, b) {
            var c, d = this._offset || 0;
            return null == a ? this._isUTC ? d : this._dateTzOffset() : ("string" == typeof a && (a = Q(a)), Math.abs(a) < 16 && (a = 60 * a), !this._isUTC && b && (c = this._dateTzOffset()), this._offset = a, this._isUTC = !0, null != c && this.subtract(c, "m"), d !== a && (!b || this._changeInProgress ? t(this, tb.duration(d - a, "m"), 1, !1) : this._changeInProgress || (this._changeInProgress = !0, tb.updateOffset(this, !0), this._changeInProgress = null)), this)
        }, zoneAbbr: function () {
            return this._isUTC ? "UTC" : ""
        }, zoneName: function () {
            return this._isUTC ? "Coordinated Universal Time" : ""
        }, parseZone: function () {
            return this._tzm ? this.zone(this._tzm) : "string" == typeof this._i && this.zone(this._i), this
        }, hasAlignedHourOffset: function (a) {
            return a = a ? tb(a).zone() : 0, (this.zone() - a) % 60 === 0
        }, daysInMonth: function () {
            return B(this.year(), this.month())
        }, dayOfYear: function (a) {
            var b = yb((tb(this).startOf("day") - tb(this).startOf("year")) / 864e5) + 1;
            return null == a ? b : this.add(a - b, "d")
        }, quarter: function (a) {
            return null == a ? Math.ceil((this.month() + 1) / 3) : this.month(3 * (a - 1) + this.month() % 3)
        }, weekYear: function (a) {
            var b = hb(this, this.localeData()._week.dow, this.localeData()._week.doy).year;
            return null == a ? b : this.add(a - b, "y")
        }, isoWeekYear: function (a) {
            var b = hb(this, 1, 4).year;
            return null == a ? b : this.add(a - b, "y")
        }, week: function (a) {
            var b = this.localeData().week(this);
            return null == a ? b : this.add(7 * (a - b), "d")
        }, isoWeek: function (a) {
            var b = hb(this, 1, 4).week;
            return null == a ? b : this.add(7 * (a - b), "d")
        }, weekday: function (a) {
            var b = (this.day() + 7 - this.localeData()._week.dow) % 7;
            return null == a ? b : this.add(a - b, "d")
        }, isoWeekday: function (a) {
            return null == a ? this.day() || 7 : this.day(this.day() % 7 ? a : a - 7)
        }, isoWeeksInYear: function () {
            return C(this.year(), 1, 4)
        }, weeksInYear: function () {
            var a = this.localeData()._week;
            return C(this.year(), a.dow, a.doy)
        }, get: function (a) {
            return a = x(a), this[a]()
        }, set: function (a, b) {
            return a = x(a), "function" == typeof this[a] && this[a](b), this
        }, locale: function (b) {
            var c;
            return b === a ? this._locale._abbr : (c = tb.localeData(b), null != c && (this._locale = c), this)
        }, lang: f("moment().lang() is deprecated. Instead, use moment().localeData() to get the language configuration. Use moment().locale() to change languages.", function (b) {
            return b === a ? this.localeData() : this.locale(b)
        }), localeData: function () {
            return this._locale
        }, _dateTzOffset: function () {
            return 15 * Math.round(this._d.getTimezoneOffset() / 15)
        }}), tb.fn.millisecond = tb.fn.milliseconds = ob("Milliseconds", !1), tb.fn.second = tb.fn.seconds = ob("Seconds", !1), tb.fn.minute = tb.fn.minutes = ob("Minutes", !1), tb.fn.hour = tb.fn.hours = ob("Hours", !0), tb.fn.date = ob("Date", !0), tb.fn.dates = f("dates accessor is deprecated. Use date instead.", ob("Date", !0)), tb.fn.year = ob("FullYear", !0), tb.fn.years = f("years accessor is deprecated. Use year instead.", ob("FullYear", !0)), tb.fn.days = tb.fn.day, tb.fn.months = tb.fn.month, tb.fn.weeks = tb.fn.week, tb.fn.isoWeeks = tb.fn.isoWeek, tb.fn.quarters = tb.fn.quarter, tb.fn.toJSON = tb.fn.toISOString, m(tb.duration.fn = l.prototype, {_bubble: function () {
            var a, b, c, d = this._milliseconds, e = this._days, f = this._months, g = this._data, h = 0;
            g.milliseconds = d % 1e3, a = o(d / 1e3), g.seconds = a % 60, b = o(a / 60), g.minutes = b % 60, c = o(b / 60), g.hours = c % 24, e += o(c / 24), h = o(pb(e)), e -= o(qb(h)), f += o(e / 30), e %= 30, h += o(f / 12), f %= 12, g.days = e, g.months = f, g.years = h
        }, abs: function () {
            return this._milliseconds = Math.abs(this._milliseconds), this._days = Math.abs(this._days), this._months = Math.abs(this._months), this._data.milliseconds = Math.abs(this._data.milliseconds), this._data.seconds = Math.abs(this._data.seconds), this._data.minutes = Math.abs(this._data.minutes), this._data.hours = Math.abs(this._data.hours), this._data.months = Math.abs(this._data.months), this._data.years = Math.abs(this._data.years), this
        }, weeks: function () {
            return o(this.days() / 7)
        }, valueOf: function () {
            return this._milliseconds + 864e5 * this._days + this._months % 12 * 2592e6 + 31536e6 * A(this._months / 12)
        }, humanize: function (a) {
            var b = gb(this, !a, this.localeData());
            return a && (b = this.localeData().pastFuture(+this, b)), this.localeData().postformat(b)
        }, add: function (a, b) {
            var c = tb.duration(a, b);
            return this._milliseconds += c._milliseconds, this._days += c._days, this._months += c._months, this._bubble(), this
        }, subtract: function (a, b) {
            var c = tb.duration(a, b);
            return this._milliseconds -= c._milliseconds, this._days -= c._days, this._months -= c._months, this._bubble(), this
        }, get: function (a) {
            return a = x(a), this[a.toLowerCase() + "s"]()
        }, as: function (a) {
            var b, c;
            if (a = x(a), "month" === a || "year" === a)
                return b = this._days + this._milliseconds / 864e5, c = this._months + 12 * pb(b), "month" === a ? c : c / 12;
            switch (b = this._days + Math.round(qb(this._months / 12)), a) {
                case"week":
                    return b / 7 + this._milliseconds / 6048e5;
                case"day":
                    return b + this._milliseconds / 864e5;
                case"hour":
                    return 24 * b + this._milliseconds / 36e5;
                case"minute":
                    return 24 * b * 60 + this._milliseconds / 6e4;
                case"second":
                    return 24 * b * 60 * 60 + this._milliseconds / 1e3;
                case"millisecond":
                    return Math.floor(24 * b * 60 * 60 * 1e3) + this._milliseconds;
                default:
                    throw new Error("Unknown unit " + a)
                }
        }, lang: tb.fn.lang, locale: tb.fn.locale, toIsoString: f("toIsoString() is deprecated. Please use toISOString() instead (notice the capitals)", function () {
            return this.toISOString()
        }), toISOString: function () {
            var a = Math.abs(this.years()), b = Math.abs(this.months()), c = Math.abs(this.days()), d = Math.abs(this.hours()), e = Math.abs(this.minutes()), f = Math.abs(this.seconds() + this.milliseconds() / 1e3);
            return this.asSeconds() ? (this.asSeconds() < 0 ? "-" : "") + "P" + (a ? a + "Y" : "") + (b ? b + "M" : "") + (c ? c + "D" : "") + (d || e || f ? "T" : "") + (d ? d + "H" : "") + (e ? e + "M" : "") + (f ? f + "S" : "") : "P0D"
        }, localeData: function () {
            return this._locale
        }}), tb.duration.fn.toString = tb.duration.fn.toISOString;
    for (vb in ic)
        c(ic, vb) && rb(vb.toLowerCase());
    tb.duration.fn.asMilliseconds = function () {
        return this.as("ms")
    }, tb.duration.fn.asSeconds = function () {
        return this.as("s")
    }, tb.duration.fn.asMinutes = function () {
        return this.as("m")
    }, tb.duration.fn.asHours = function () {
        return this.as("h")
    }, tb.duration.fn.asDays = function () {
        return this.as("d")
    }, tb.duration.fn.asWeeks = function () {
        return this.as("weeks")
    }, tb.duration.fn.asMonths = function () {
        return this.as("M")
    }, tb.duration.fn.asYears = function () {
        return this.as("y")
    }, tb.locale("en", {ordinalParse: /\d{1,2}(th|st|nd|rd)/, ordinal: function (a) {
            var b = a % 10, c = 1 === A(a % 100 / 10) ? "th" : 1 === b ? "st" : 2 === b ? "nd" : 3 === b ? "rd" : "th";
            return a + c
        }}), Jb ? module.exports = tb : "function" == typeof define && define.amd ? (define("moment", function (a, b, c) {
        return c.config && c.config() && c.config().noGlobal === !0 && (xb.moment = ub), tb
    }), sb(!0)) : sb()
}).call(this);

