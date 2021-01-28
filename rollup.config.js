import {terser} from 'rollup-plugin-terser';
import resolve from 'rollup-plugin-node-resolve';
import commonjs from 'rollup-plugin-commonjs';
import postcss from 'rollup-plugin-postcss';
import cleanCss from 'postcss-clean';

process.chdir(__dirname);

module.exports = {
  input:   './src/_resources/fusion.js',
  output:  {
    file:   './resources/fusion.min.js',
    format: 'iife',
    name:   'fusion'
  },
  plugins: [
    resolve({browser: true, preferBuiltins: false}),
    commonjs(),
    terser(),
    postcss({
      extract:  true,
      minimize: true,
      plugins:  [
        cleanCss({
          level: {
            1: {
              roundingPrecision: 2,
            },
          },
        }),
      ],
    }),
  ],
};
