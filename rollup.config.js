import {terser} from 'rollup-plugin-terser';
import resolve from 'rollup-plugin-node-resolve';
import commonjs from 'rollup-plugin-commonjs';
import postcss from 'rollup-plugin-postcss';

process.chdir(__dirname);

const defaultCfg = {
  input:   './build.js',
  output:  {
    file:   './src/_resources/fusion.min.js',
    format: 'iife',
  },
  plugins: [
    postcss({extract: true, minimize: true}),
    resolve({browser: true, preferBuiltins: false}),
    commonjs(),
    terser(),
  ],
};

export default [defaultCfg];
