<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Product extends KoController
{
    public function seolink()
    {

            //Products...
        $id = $this->security->xss_clean($this->uri->segment(2));

        foreach ($this->products_model->product($id) as $products) {
            $product[] = array(
                       'id'  			=> $products->id,
                       'name'			=> $products->name,
                       'details'		=> $products->details,
                       'product_id'		=> $products->product_id,
                       'rank'			=> $products->rank,
                       'category_id'	=> $products->category_id,
                       'price'			=> $products->price,
                       'stock'			=> $products->stock,
                       'image'			=> $products->image,
                       'url'			=> $products->url,
                       'description_id'	=> $products->description_id,
                       'language_id'	=> $products->language_id,
                       'meta_tags'		=> $products->meta_tags,
                       'meta_keys'		=> $products->meta_keys
                    );
        }

        $this->data['product'] = $product;

        if ($this->products_model->product_options($id)) {
            foreach ($this->products_model->product_options($id) as $option) {
                $options[] = array(
                       'id'					=> $option->id,
                       'product_id'			=> $option->product_id,
                       'option_type'		=> $option->option_type,
                       'option_name'		=> $option->option_name,
                       'values' 			=> $this->products_model->product_options_value($option->opt_id_for_value, $option->product_id)
                   );
            }

            $this->data['options'] = $options;
        }

        //Menu...
        $this->data['categories'] = $this->categories_model->get_cats();

        $this->load->view('product', $this->data);
    }
}
