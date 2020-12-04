import {terser} from 'rollup-plugin-terser';
import resolve from 'rollup-plugin-node-resolve';
import commonjs from 'rollup-plugin-commonjs';
import postcss from 'rollup-plugin-postcss';
import combineMediaQuery from 'postcss-combine-media-query';
import cleanCss from 'postcss-clean';

process.chdir(__dirname);

const defaultCfg = {
  input:   './build.js',
  output:  {
    file:   './src/_resources/fusion.min.js',
    format: 'iife',
  },
  plugins: [
    resolve({browser: true, preferBuiltins: false}),
    commonjs(),
    terser(),
    postcss({
      extract:  true,
      minimize: true,
      plugins:  [
        combineMediaQuery(),
        cleanCss({
          level: {
            1: {
              roundingPrecision: 3,
            },
          },
        }),
      ],
    }),
  ],
};

export default [defaultCfg];
